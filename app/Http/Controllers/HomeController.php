<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured projects (limit to 6 for display)
        $featuredProjects = Project::with(['user', 'reward'])
            ->where('featured', true)
            ->where('status', 'active')
            ->orderBy('pledged', 'desc')
            ->limit(6)
            ->get();

        // Get recent projects (last 7 days, limit to 6)
        $recentProjects = Project::with(['user', 'reward'])
            ->where('created_at', '>=', now()->subDays(7))
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // If no recent projects, get latest projects
        if ($recentProjects->count() === 0) {
            $recentProjects = Project::with(['user', 'reward'])
                ->where('status', 'active')
                ->orderBy('created_at', 'desc')
                ->limit(6)
                ->get();
        }

        // Calculate platform statistics
        $stats = [
            'total_projects' => Project::count(),
            'total_funded' => Project::sum('pledged'),
            'total_backers' => Project::sum('investors'),
            'success_rate' => Project::where('status', 'active')->count() > 0 
                ? round((Project::whereRaw('pledged >= goal')->count() / Project::where('status', 'active')->count()) * 100) 
                : 98
        ];

        // Get trending categories
        $categories = [
            'technology' => Project::where('category', 'technology')->count(),
            'design' => Project::where('category', 'design')->count(),
            'games' => Project::where('category', 'games')->count(),
            'film' => Project::where('category', 'film')->count(),
            'music' => Project::where('category', 'music')->count(),
            'art' => Project::where('category', 'art')->count(),
        ];

        // Sort categories by project count
        arsort($categories);
        $topCategories = array_slice($categories, 0, 6, true);

        return view('welcome', compact(
            'featuredProjects', 
            'recentProjects', 
            'stats', 
            'topCategories'
        ));
    }

    public function getFeaturedProjects()
    {
        $projects = Project::with(['user', 'reward'])
            ->where('featured', true)
            ->where('status', 'active')
            ->orderBy('pledged', 'desc')
            ->limit(12)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $projects
        ]);
    }

    public function getRecentProjects()
    {
        $projects = Project::with(['user', 'reward'])
            ->where('created_at', '>=', now()->subDays(7))
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit(12)
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $projects
        ]);
    }

    public function getStats()
    {
        $stats = [
            'total_projects' => Project::count(),
            'total_funded' => Project::sum('pledged'),
            'total_backers' => Project::sum('investors'),
            'active_projects' => Project::where('status', 'active')->count(),
            'funded_projects' => Project::whereRaw('pledged >= goal')->count(),
            'success_rate' => Project::where('status', 'active')->count() > 0 
                ? round((Project::whereRaw('pledged >= goal')->count() / Project::where('status', 'active')->count()) * 100) 
                : 98,
            'categories' => [
                'technology' => Project::where('category', 'technology')->count(),
                'design' => Project::where('category', 'design')->count(),
                'games' => Project::where('category', 'games')->count(),
                'film' => Project::where('category', 'film')->count(),
                'music' => Project::where('category', 'music')->count(),
                'art' => Project::where('category', 'art')->count(),
                'food' => Project::where('category', 'food')->count(),
                'fashion' => Project::where('category', 'fashion')->count(),
                'publishing' => Project::where('category', 'publishing')->count(),
                'crafts' => Project::where('category', 'crafts')->count(),
            ]
        ];

        return response()->json([
            'status' => 'success',
            'data' => $stats
        ]);
    }
}