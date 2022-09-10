<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reward;

use App\Models\project;
class rewardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reward = reward::with('project')->get();
        $project = project::with('reward')->get();
        return view ('reward.index', compact('reward', 'project'))
        ;
    }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = project::all();

        return view('reward.create')->with('project',$projects) ;

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
        $reward = new reward;
        $reward->name = $request->name;
        $reward->project_id = $request->project_id;
        $reward->description = $request->description;
        $reward->discount = $request->discount;
        

        $reward->save();
        
    
       //project::create($input);
        return redirect('reward')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = reward::find($id);

        return view('reward.show')->with('reward', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = reward::find($id);
        $projects = project::all();

        return view('reward.edit')->with('reward', $contact)->with('project',$projects);
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
        $reward = new reward;
        $reward = reward::find($id);
        $reward->name = $request->name;
        $reward->project_id = $request->project_id;
        $reward->description = $request->description;
        $reward->discount = $request->discount;
        

        $reward->save();    
        //$input = $request->all();
       
       // $contact->update($project);
        return redirect('reward')->with('flash_message', 'project Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        reward::destroy($id);
        return redirect('reward')->with('flash_message', 'project deleted!');
    }
}
