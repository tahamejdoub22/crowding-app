<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Models\Reward;
use App\Models\Update;
use App\Models\User;
use Illuminate\Http\Request;

class DetailController extends Controller
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

        return view('project.detail', compact('project', 'user', 'reward', 'updates', 'comment'))->with('projects', $contact);
    }

    public function create($id)
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

        return view('project.detail', compact('project', 'user', 'reward', 'updates', 'comment'))->with('projects', $contact);
    }

    public function store(Request $request)
    {
        // $input = $request->all();
        $comment = new Comment;

        $comment->name = $request->name;
        $comment->user_id = (int) $request->input('user_id');

        $comment->text = $request->text;
        $comment->project_id = (int) $request->input('project_id');
        $comment->image = $request->image;

        $comment->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // Project::create($input);

        return redirect()->back()->with('success', 'sssssss');
    }
}
