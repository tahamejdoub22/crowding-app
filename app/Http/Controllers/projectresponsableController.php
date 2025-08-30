<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Reward;
use App\Models\Update;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectResponsableController extends Controller
{
    public function show($id)
    {
        $contact = Project::find($id);

        $project = Project::with('user')->get();
        $project = Project::with('reward')->get();
        $project = Project::with('updates')->get();
        $project = Project::with('comment')->get();
        $user = User::with('project')->get();
        $reward = Reward::with('project')->get();
        $updates = Update::with('project')->get();
        $comment = Comment::with('project')->get();

        return view('project.deatil1', compact('project', 'user', 'reward', 'updates', 'comment'))->with('projects', $contact);
    }

    public function index()
    {
        $project = Project::with('user')->get();
        $project = Project::with('reward')->get();
        $project = Project::with('updates')->get();
        $project = Project::with('comment')->get();
        $user = User::with('project')->get();
        $reward = Reward::with('project')->get();
        $updates = Update::with('project')->get();
        $comment = Comment::with('project')->get();

        return view('project.createreward', compact('project', 'user', 'reward', 'updates', 'comment'));
    }

    public function create($id)
    {
        $contact = Project::find($id);

        return view('project.deatil1')->with('project', $contact);
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        $updates = new Update;

        $updates->name = $request->name;
        $updates->user_id = (int) $request->input('user_id');

        $updates->text = $request->text;
        $updates->project_id = (int) $request->input('project_id');
        $updates->image = $request->image;

        $updates->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // Project::create($input);

        return redirect()->back()->with('success', 'sssssss');
    }

    public function storere(Request $request)
    {
        // $input = $request->all();
        $reward = new Reward;

        $reward->name = $request->name;

        $reward->description = $request->description;
        $reward->project_id = (int) $request->input('project_id');
        $reward->discount = $request->discount;

        $reward->save();

        // Project::create($input);

        return redirect('createlist')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createres()
    {
        $user = User::whereHas('roles', function($query) {
            $query->where('name', 'projectresponsable');
        })->get();

        return view('project.createres')->with('user', $user);
    }

    public function createre()
    {
        $projects = Project::all();

        // / $user = User::all();
        return view('project.reew')->with('project', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeres(Request $request)
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

        // Project::create($input);
        return redirect('rewardlist')->with('flash_message', 'Contact Addedd!');
    }
}
