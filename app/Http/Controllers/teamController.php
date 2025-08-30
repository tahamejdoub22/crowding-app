<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::with('user')->get();
        $user = User::with('team')->get();

        return view('team.index', compact('team', 'user'));
    }

    public function test()
    {
        $team = Team::with('user')->get();
        $user = User::with('team')->get();

        return view('project.team', compact('team', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('team.create')->with('user', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $team = new Team;
        $team->name = $request->name;
        $team->user_id = $request->user_id;
        $team->displayname = $request->displayname;

        $team->image = $request->image;

        $team->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // project::create($input);
        return redirect('team')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Team::find($id);

        return view('team.show')->with('team', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Team::find($id);
        $users = User::all();

        return view('team.edit')->with('team', $contact)->with('user', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = new Team;
        $team = Team::find($id);

        $team->name = $request->name;
        $team->user_id = $request->user_id;
        $team->displayname = $request->displayname;

        $team->image = $request->image;

        $team->save();
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
        return redirect('team')->with('flash_message', 'team Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::destroy($id);

        return redirect('team')->with('flash_message', 'team deleted!');
    }
}
