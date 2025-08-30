<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::with('user')->get();
        $comment = Comment::with('project')->get();
        $project = Project::with('comment')->get();

        $user = User::with('comment')->get();

        return view('comment.index', compact('comment', 'project', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $projects = Project::all();

        return view('comment.create')->with('user', $users)->with('project', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;
        $comment->project_id = $request->project_id;
        $comment->image = $request->image;

        $comment->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // Project::create($input);
        return redirect('comment')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Comment::find($id);

        return view('comment.show')->with('comment', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Comment::find($id);
        $users = User::all();
        $projects = Project::all();

        return view('comment.edit')->with('comment', $contact)->with('user', $users)->with('project', $projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = new Comment;
        $comment = Comment::find($id);
        $comment->name = $request->name;
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;
        $comment->project_id = $request->project_id;
        $comment->image = $request->image;

        $comment->save();
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
        return redirect('comment')->with('flash_message', 'comment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return redirect('comment')->with('flash_message', 'comment deleted!');
    }
}
