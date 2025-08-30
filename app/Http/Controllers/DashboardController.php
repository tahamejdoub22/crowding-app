<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Reward;
use App\Models\Update;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();
        
        // Load all data efficiently
        $projects = Project::with(['user', 'reward', 'updates', 'comment'])->get();
        $users = User::all();
        $rewards = Reward::with('project')->get();
        $updates = Update::with('project')->get();
        $comments = Comment::with('project')->get();
        
        $dashboardData = [
            'user' => $currentUser,
            'role' => $currentUser->roles->first()?->name ?? 'guest',
            'projects' => $projects,
            'users' => $users,
            'rewards' => $rewards,
            'updates' => $updates,
            'comments' => $comments,
            'stats' => [
                'total_projects' => $projects->count(),
                'total_users' => $users->count(),
                'total_rewards' => $rewards->count(),
                'total_updates' => $updates->count(),
                'total_comments' => $comments->count(),
            ]
        ];
        
        if ($currentUser->hasRole(['admin', 'projectresponsable', 'projectinvestor'])) {
            return response()->json($dashboardData);
        }
        
        return response()->json(['error' => 'Access denied. Please contact administrator.'], 403);
    }
}
