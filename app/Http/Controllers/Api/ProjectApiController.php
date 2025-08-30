<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectApiController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Project::with(['creator:id,name,email,created_at', 'rewards:id,project_id,name,description,discount'])
            ->select([
                'id', 'project_name', 'short_description', 'user_id', 'project_location', 
                'category', 'goal', 'pledged', 'investors', 'views', 'likes', 'shares',
                'image', 'video_url', 'status', 'featured', 'verified', 'staff_pick', 'trending',
                'start_date', 'end_date', 'created_at', 'updated_at'
            ]);

        // Default: only show published projects that are still active
        if (!$request->has('status') || empty($request->status)) {
            $query->published();
        }

        // Advanced Search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('project_name', 'like', $searchTerm)
                  ->orWhere('short_description', 'like', $searchTerm)
                  ->orWhere('project_description', 'like', $searchTerm)
                  ->orWhere('project_location', 'like', $searchTerm);
            });
        }

        // Advanced Filters
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        if ($request->has('status') && !empty($request->status)) {
            switch ($request->status) {
                case 'active':
                    $query->active();
                    break;
                case 'successful':
                    $query->successful();
                    break;
                case 'ending_soon':
                    $query->endingSoon();
                    break;
                case 'recently_launched':
                    $query->recentlyLaunched();
                    break;
                default:
                    $query->where('status', $request->status);
            }
        }

        if ($request->has('featured') && $request->featured) {
            $query->featured();
        }

        if ($request->has('verified') && $request->verified) {
            $query->verified();
        }

        if ($request->has('trending') && $request->trending) {
            $query->trending();
        }

        // Funding Range Filter
        if ($request->has('min_funding')) {
            $query->where('pledged', '>=', $request->min_funding);
        }
        if ($request->has('max_funding')) {
            $query->where('pledged', '<=', $request->max_funding);
        }

        // Goal Range Filter
        if ($request->has('min_goal')) {
            $query->where('goal', '>=', $request->min_goal);
        }
        if ($request->has('max_goal')) {
            $query->where('goal', '<=', $request->max_goal);
        }

        // Advanced Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        switch ($sortBy) {
            case 'funding_progress':
                $query->orderByRaw('(pledged / goal) DESC');
                break;
            case 'funding_velocity':
                $query->orderByRaw('(pledged / DATEDIFF(NOW(), start_date)) DESC');
                break;
            case 'popularity':
                $query->orderBy('views', 'desc')
                      ->orderBy('likes', 'desc')
                      ->orderBy('investors', 'desc');
                break;
            case 'ending_soon':
                $query->orderBy('end_date', 'asc');
                break;
            case 'most_funded':
                $query->orderBy('pledged', 'desc');
                break;
            case 'most_backers':
                $query->orderBy('investors', 'desc');
                break;
            default:
                $query->orderBy($sortBy, $sortOrder);
        }

        $perPage = min($request->get('per_page', 12), 50); // Max 50 per page
        $projects = $query->paginate($perPage);

        return response()->json([
            'status' => 'success',
            'data' => $projects,
            'filters' => [
                'categories' => $this->getCategories(),
                'statuses' => $this->getStatuses(),
                'sort_options' => $this->getSortOptions(),
            ]
        ]);
    }

    public function featured(): JsonResponse
    {
        $projects = Project::with(['creator:id,name', 'rewards'])
            ->select([
                'id', 'project_name', 'short_description', 'user_id', 'project_location',
                'category', 'goal', 'pledged', 'investors', 'views', 'likes',
                'image', 'status', 'featured', 'verified', 'end_date', 'created_at'
            ])
            ->where(function ($query) {
                $query->featured()
                      ->orWhere('staff_pick', true)
                      ->orWhere('trending', true);
            })
            ->published()
            ->orderByRaw('(pledged / goal) DESC')
            ->orderBy('views', 'desc')
            ->limit(12)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $projects,
        ]);
    }

    public function trending(): JsonResponse
    {
        $projects = Project::with(['creator:id,name'])
            ->trending()
            ->active()
            ->orderByRaw('(pledged / DATEDIFF(NOW(), start_date)) DESC')
            ->limit(8)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $projects,
        ]);
    }

    public function staffPicks(): JsonResponse
    {
        $projects = Project::with(['creator:id,name'])
            ->where('staff_pick', true)
            ->active()
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $projects,
        ]);
    }

    public function endingSoon(): JsonResponse
    {
        $projects = Project::with(['creator:id,name'])
            ->endingSoon(7)
            ->orderBy('end_date', 'asc')
            ->limit(8)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $projects,
        ]);
    }

    public function analytics(Project $project): JsonResponse
    {
        $project->incrementViews();

        $analytics = [
            'basic_stats' => [
                'views' => $project->views,
                'likes' => $project->likes,
                'shares' => $project->shares,
                'conversion_rate' => $project->conversion_rate,
            ],
            'funding_metrics' => [
                'funding_percentage' => $project->funding_percentage,
                'average_pledge' => $project->average_pledge,
                'funding_velocity' => $project->funding_velocity,
            ],
            'timeline' => [
                'days_left' => $project->days_left,
                'is_active' => $project->is_active,
                'is_successful' => $project->is_successful,
            ],
            'stretch_goals' => [
                'next_goal' => $project->getNextStretchGoal(),
                'achieved_goals' => $project->getAchievedStretchGoals(),
            ]
        ];

        return response()->json([
            'status' => 'success',
            'data' => $analytics,
        ]);
    }

    public function show(Project $project): JsonResponse
    {
        // Increment view count
        $project->incrementViews();

        $project->load([
            'creator:id,name,email,created_at',
            'rewards' => function ($query) {
                $query->orderBy('discount', 'asc');
            },
            'updates' => function ($query) {
                $query->orderBy('created_at', 'desc')->limit(5);
            },
            'comments' => function ($query) {
                $query->with('user:id,name')->orderBy('created_at', 'desc')->limit(10);
            }
        ]);

        // Calculate advanced metrics
        $project->updateConversionRate();

        return response()->json([
            'status' => 'success',
            'data' => [
                'project' => $project,
                'similar_projects' => $this->getSimilarProjects($project),
                'campaign_metrics' => [
                    'funding_velocity' => $project->funding_velocity,
                    'conversion_rate' => $project->conversion_rate,
                    'average_pledge' => $project->average_pledge,
                ]
            ]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            // Basic Info
            'project_name' => 'required|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'short_description' => 'required|string|max:500',
            'project_description' => 'required|string|min:100',
            'project_location' => 'required|string|max:255',
            
            // Campaign Details
            'category' => 'required|string|in:technology,design,games,film,music,art,food,fashion,publishing,crafts',
            'tags' => 'nullable|array|max:10',
            'tags.*' => 'string|max:50',
            
            // Financial
            'goal' => 'required|numeric|min:100|max:10000000',
            'minimum_goal' => 'nullable|numeric|min:100|lt:goal',
            'funding_type' => 'required|in:all_or_nothing,flexible',
            'currency' => 'nullable|string|size:3',
            
            // Timeline
            'duration_days' => 'required|integer|min:1|max:90',
            'launch_date' => 'nullable|date|after_or_equal:today',
            
            // Media
            'image' => 'nullable|string|max:255',
            'video_url' => 'nullable|url',
            'gallery' => 'nullable|array|max:10',
            'gallery.*' => 'string|max:255',
            
            // Additional Content
            'risks_challenges' => 'nullable|string|max:2000',
            'environmental_impact' => 'nullable|string|max:1000',
            'team_info' => 'nullable|array',
            'social_media_links' => 'nullable|array',
            
            // Stretch Goals
            'stretch_goals' => 'nullable|array|max:10',
            'stretch_goals.*.amount' => 'required_with:stretch_goals|numeric|gt:goal',
            'stretch_goals.*.title' => 'required_with:stretch_goals|string|max:255',
            'stretch_goals.*.description' => 'nullable|string|max:500',
        ]);

        // Set dates
        $launchDate = $validated['launch_date'] ? 
            \Carbon\Carbon::parse($validated['launch_date']) : 
            now()->addDays(7); // Default to 1 week from now

        $endDate = $launchDate->copy()->addDays($validated['duration_days']);

        $project = Project::create([
            ...$validated,
            'user_id' => auth()->id(),
            'start_date' => $launchDate,
            'launch_date' => $launchDate,
            'end_date' => $endDate,
            'pledged' => 0,
            'investors' => 0,
            'views' => 0,
            'likes' => 0,
            'shares' => 0,
            'status' => 'draft',
            'seo_title' => $validated['seo_title'] ?? $validated['project_name'],
            'seo_description' => $validated['short_description'],
            'image' => $validated['image'] ?? 'default-project.jpg',
            'currency' => $validated['currency'] ?? 'USD',
            'minimum_goal' => $validated['minimum_goal'] ?? $validated['goal'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Project created successfully',
            'data' => $project->load('creator'),
        ], 201);
    }

    public function update(Request $request, Project $project): JsonResponse
    {
        $this->authorize('update', $project);

        $validated = $request->validate([
            'project_name' => 'string|max:255',
            'short_description' => 'string|max:500',
            'project_description' => 'string|min:100',
            'project_location' => 'string|max:255',
            'category' => 'string|in:technology,design,games,film,music,art,food,fashion,publishing,crafts',
            'tags' => 'array|max:10',
            'goal' => 'numeric|min:100|max:10000000',
            'image' => 'string|max:255',
            'video_url' => 'nullable|url',
            'gallery' => 'array|max:10',
            'risks_challenges' => 'string|max:2000',
            'environmental_impact' => 'string|max:1000',
            'team_info' => 'array',
            'social_media_links' => 'array',
        ]);

        // Don't allow goal changes if project has backers
        if (isset($validated['goal']) && $project->investors > 0) {
            unset($validated['goal']);
        }

        $project->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Project updated successfully',
            'data' => $project->load('creator'),
        ]);
    }

    public function destroy(Project $project): JsonResponse
    {
        $this->authorize('delete', $project);

        // Don't allow deletion if project has backers
        if ($project->investors > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cannot delete project with existing backers',
            ], 422);
        }

        $project->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Project deleted successfully',
        ]);
    }

    // Helper Methods
    private function getCategories(): array
    {
        return [
            ['id' => 'technology', 'name' => 'Technology', 'icon' => 'cpu-chip'],
            ['id' => 'design', 'name' => 'Design', 'icon' => 'paint-brush'],
            ['id' => 'games', 'name' => 'Games', 'icon' => 'puzzle-piece'],
            ['id' => 'film', 'name' => 'Film & Video', 'icon' => 'film'],
            ['id' => 'music', 'name' => 'Music', 'icon' => 'musical-note'],
            ['id' => 'art', 'name' => 'Art', 'icon' => 'sparkles'],
            ['id' => 'food', 'name' => 'Food', 'icon' => 'cake'],
            ['id' => 'fashion', 'name' => 'Fashion', 'icon' => 'user'],
            ['id' => 'publishing', 'name' => 'Publishing', 'icon' => 'book-open'],
            ['id' => 'crafts', 'name' => 'Crafts', 'icon' => 'wrench-screwdriver'],
        ];
    }

    private function getStatuses(): array
    {
        return [
            ['id' => 'active', 'name' => 'Live Campaigns'],
            ['id' => 'successful', 'name' => 'Successfully Funded'],
            ['id' => 'ending_soon', 'name' => 'Ending Soon'],
            ['id' => 'recently_launched', 'name' => 'Recently Launched'],
            ['id' => 'draft', 'name' => 'Coming Soon'],
        ];
    }

    private function getSortOptions(): array
    {
        return [
            ['id' => 'created_at', 'name' => 'Newest First'],
            ['id' => 'funding_progress', 'name' => 'Funding Progress'],
            ['id' => 'funding_velocity', 'name' => 'Trending'],
            ['id' => 'most_funded', 'name' => 'Most Funded'],
            ['id' => 'most_backers', 'name' => 'Most Backers'],
            ['id' => 'ending_soon', 'name' => 'Ending Soon'],
            ['id' => 'popularity', 'name' => 'Most Popular'],
        ];
    }

    private function getSimilarProjects(Project $project, int $limit = 4): \Illuminate\Database\Eloquent\Collection
    {
        return Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->active()
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
