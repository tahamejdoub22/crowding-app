<?php

namespace App\Http\Controllers;
use App\Models\project;
use App\Models\User;
use App\Models\update;
use App\Models\comment;
use App\Models\reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardControlller extends Controller
{

public function index(){

    if(Auth::user()->hasRole('projectresponsable')){
        $project = project::with('user')->get();
        $project = project::with('reward')->get();
        $project = project::with('updates')->get();
        $project = project::with('comment')->get();
        $user = User::with('project')->get();
        $reward = reward::with('project')->get();
        $updates = update::with('project')->get();
        $comment = comment::with('project')->get();    
        return view('project/createres', compact('project', 'user','reward','updates','comment'));

    }
    elseif(Auth::user()->hasRole('admin')){
        return view('project/layout');
    }
    elseif(Auth::user()->hasRole('projectinvestor')){
        $project = project::with('user')->get();
        $project = project::with('reward')->get();
        $project = project::with('updates')->get();
        $project = project::with('comment')->get();
        $user = User::with('project')->get();
        $reward = reward::with('project')->get();
        $updates = update::with('project')->get();
        $comment = comment::with('project')->get();    
         return view('project/layout1', compact('project', 'user','reward','updates','comment')) ;

    }
}
}
