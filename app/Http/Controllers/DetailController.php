<?php

namespace App\Http\Controllers;
use App\Models\project;
use App\Models\User;
use App\Models\update;
use App\Models\comment;
use App\Models\reward;


use Illuminate\Http\Request;

class DetailController extends Controller
{ 
   
    public function show($id)
    {
        $contact = project::find($id);

        $project = project::with('user')->get();
        $project = project::with('reward')->get();
        $project = project::with('updates')->get();
        $project = project::with('comment')->get();
        $user = User::with('project')->get();
        $reward = reward::with('project')->get();
        $updates = update::with('project')->get();
        $comment = comment::with('project')->get();
       
        return view('project.detail', compact('project', 'user','reward','updates','comment'))->with('projects', $contact);
    }
    public function create($id)
    {
        $contact = project::find($id);

        $project = project::with('user')->get();
        $project = project::with('reward')->get();
        $project = project::with('updates')->get();
        $project = project::with('comment')->get();
        $user = User::with('project')->get();
        $reward = reward::with('project')->get();
        $updates = update::with('project')->get();
        $comment = comment::with('project')->get();
        return view('project.detail' , compact('project', 'user','reward','updates','comment'))->with('projects', $contact);

    }
    public function store(Request $request)
    {
       
       // $input = $request->all();
        $comment = new comment;

        $comment->name = $request->name;
        $comment->user_id = (int)$request->input('user_id');

        $comment->text = $request->text;
        $comment->project_id = (int)$request->input('project_id');
        $comment->image = $request->image;

        $comment->save();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
       //project::create($input);
  
       return redirect()->back()->with('success', 'sssssss');    
    }
}
