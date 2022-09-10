<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = project::with('user')->get();
        $user = User::with('project')->get();
        return view ('project.index', compact('project', 'user'))
        ;
    }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::whereRoleIs([ 'projectresponsable'])->get();

        
       /// $user = User::all();
    return view('project.create')->with('user', $user) ;
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
        $project = new project;
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
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
       //project::create($input);
        return redirect('project')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = project::find($id);

        return view('project.show')->with('project', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = project::find($id);
        $user = User::all();

        return view('project.edit')->with('project', $contact)->with('user',$user);
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
        $project = new project;
        $project = project::find($id);

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
        return redirect('project')->with('flash_message', 'project Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        project::destroy($id);
        return redirect('project')->with('flash_message', 'project deleted!');
    }
}
