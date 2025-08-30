<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Update;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updates = Update::with('user')->get();
        $updates = Update::with('project')->get();
        $project = Project::with('updates')->get();

        $user = User::with('updates')->get();

        return view('update.index', compact('updates', 'project', 'user'));
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

        return view('update.create')->with('user', $users)->with('project', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $updates = new Update;
        $updates->name = $request->name;
        $updates->user_id = $request->user_id;
        $updates->text = $request->text;
        $updates->project_id = $request->project_id;
        $updates->image = $request->image;

        $updates->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // Project::create($input);
        return redirect('updates')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Update::find($id);

        return view('update.show')->with('updates', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Update::find($id);
        $users = User::all();
        $projects = Project::all();

        return view('update.edit')->with('updates', $contact)->with('user', $users)->with('project', $projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updates = new Update;
        $updates = Update::find($id);
        $updates->name = $request->name;
        $updates->user_id = $request->user_id;
        $updates->text = $request->text;
        $updates->project_id = $request->project_id;
        $updates->image = $request->image;

        $updates->save();
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
        return redirect('updates')->with('flash_message', 'update Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Update::destroy($id);

        return redirect('updates')->with('flash_message', 'updates deleted!');
    }
}
