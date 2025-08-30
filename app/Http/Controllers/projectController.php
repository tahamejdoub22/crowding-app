<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Project::with(['user', 'reward', 'comment', 'updates']);

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('project_name', 'like', '%' . $request->search . '%')
                  ->orWhere('project_description', 'like', '%' . $request->search . '%')
                  ->orWhere('project_location', 'like', '%' . $request->search . '%');
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Status filter based on dates and funding
        if ($request->filled('status')) {
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
                case 'draft':
                    $query->where('status', 'draft');
                    break;
            }
        }

        // Advanced filters
        if ($request->filled('min_funding')) {
            $query->where('pledged', '>=', $request->min_funding);
        }

        if ($request->filled('max_funding')) {
            $query->where('pledged', '<=', $request->max_funding);
        }

        if ($request->filled('featured') && $request->featured) {
            $query->featured();
        }

        if ($request->filled('verified') && $request->verified) {
            $query->verified();
        }

        if ($request->filled('trending') && $request->trending) {
            $query->trending();
        }

        if ($request->filled('staff_pick') && $request->staff_pick) {
            $query->where('staff_pick', true);
        }

        // Advanced sorting
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        
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

        $projects = $query->paginate(12);
        
        // Categories for filter dropdown
        $categories = [
            'technology' => 'Technology',
            'design' => 'Design', 
            'games' => 'Games',
            'film' => 'Film & Video',
            'music' => 'Music',
            'art' => 'Art',
            'food' => 'Food',
            'fashion' => 'Fashion',
            'publishing' => 'Publishing',
            'crafts' => 'Crafts'
        ];

        return view('project.index', compact('projects', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::whereHas('roles', function($query) {
            $query->where('name', 'projectresponsable');
        })->get();

        return view('project.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $project = new Project;
        $project->project_name = $request->project_name;
        $project->user_id = $request->user_id;
        $project->project_location = $request->project_location;
        $project->project_description = $request->project_description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->goal = $request->goal;
        $project->pledged = $request->pledged;
        $project->investors = $request->investors;
        $project->image = $request->image;

        $project->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // project::create($input);
        return redirect('project')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Project::find($id);

        return view('project.show')->with('project', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Project::find($id);
        $user = User::all();

        return view('project.edit')->with('project', $contact)->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = new Project;
        $project = Project::find($id);

        $project->project_name = $request->project_name;
        $project->user_id = $request->user_id;
        $project->project_location = $request->project_location;
        $project->project_description = $request->project_description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->goal = $request->goal;
        $project->pledged = $request->pledged;
        $project->investors = $request->investors;
        $project->image = $request->image;

        $project->save();
        // $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            // unset($input['image']);
        }

        // $contact->update($project);
        return redirect('project')->with('flash_message', 'project Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);

        return redirect('project')->with('flash_message', 'project deleted!');
    }

    /**
     * Display a public listing of projects for exploration (no auth required).
     *
     * @return \Illuminate\Http\Response
     */
    public function explore(Request $request)
    {
        $query = Project::with(['user', 'reward', 'comment', 'updates'])
                        ->where('status', '!=', 'draft'); // Only show published projects

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('project_name', 'like', '%' . $request->search . '%')
                  ->orWhere('project_description', 'like', '%' . $request->search . '%')
                  ->orWhere('project_location', 'like', '%' . $request->search . '%');
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Status filter based on dates and funding
        if ($request->filled('status')) {
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
            }
        }

        // Advanced filters
        if ($request->filled('min_funding')) {
            $query->where('pledged', '>=', $request->min_funding);
        }

        if ($request->filled('max_funding')) {
            $query->where('pledged', '<=', $request->max_funding);
        }

        if ($request->filled('featured') && $request->featured) {
            $query->featured();
        }

        if ($request->filled('verified') && $request->verified) {
            $query->verified();
        }

        if ($request->filled('trending') && $request->trending) {
            $query->trending();
        }

        if ($request->filled('staff_pick') && $request->staff_pick) {
            $query->where('staff_pick', true);
        }

        // Advanced sorting
        $sortBy = $request->get('sort', 'created_at');
        $sortOrder = $request->get('order', 'desc');
        
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

        $projects = $query->paginate(12);
        
        // Categories for filter dropdown
        $categories = [
            'technology' => 'Technology',
            'design' => 'Design', 
            'games' => 'Games',
            'film' => 'Film & Video',
            'music' => 'Music',
            'art' => 'Art',
            'food' => 'Food',
            'fashion' => 'Fashion',
            'publishing' => 'Publishing',
            'crafts' => 'Crafts'
        ];

        return view('project.explore', compact('projects', 'categories'));
    }

    /**
     * Display a public project detail (no auth required).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publicShow($id)
    {
        $project = Project::with(['user', 'reward', 'comment.user', 'updates'])
                          ->where('status', '!=', 'draft') // Only show published projects
                          ->findOrFail($id);

        // Increment view count
        $project->increment('views');

        return view('project.public-show', compact('project'));
    }
}
