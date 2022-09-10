<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\team;
class teamController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $team = team::with('user')->get();
        $user = User::with('team')->get();
        return view ('team.index', compact('team', 'user'))
        ;
    }
    public function test()
    {

        $team = team::with('user')->get();
        $user = User::with('team')->get();
        return view ('project.team', compact('team', 'user'))
        ;
    }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('team.create')->with('user',$users) ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

       // $input = $request->all();
        $team = new team;
        $team->name = $request->name;
        $team->user_id = $request->user_id;
        $team->displayname = $request->displayname;
       
        $team->image = $request->image;

        $team->save();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
       //project::create($input);
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
        $contact = team::find($id);

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
        $contact = team::find($id);
        $users = User::all();

        return view('team.edit')->with('team', $contact)->with('user',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = new team;
        $team = team::find($id);

        $team->name = $request->name;
        $team->user_id = $request->user_id;
        $team->displayname = $request->displayname;
       
        $team->image = $request->image;

        $team->save();    
        //$input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
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
        team::destroy($id);
        return redirect('team')->with('flash_message', 'team deleted!');
    }}
