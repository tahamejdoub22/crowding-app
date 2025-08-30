<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reward = Reward::with('project')->get();
        $project = Project::with('reward')->get();

        return view('reward.index', compact('reward', 'project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();

        return view('reward.create')->with('project', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $reward = new Reward;
        $reward->name = $request->name;
        $reward->project_id = $request->project_id;
        $reward->description = $request->description;
        $reward->discount = $request->discount;

        $reward->save();

        // Project::create($input);
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
        $contact = Reward::find($id);

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
        $contact = Reward::find($id);
        $projects = Project::all();

        return view('reward.edit')->with('reward', $contact)->with('project', $projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reward = new Reward;
        $reward = Reward::find($id);
        $reward->name = $request->name;
        $reward->project_id = $request->project_id;
        $reward->description = $request->description;
        $reward->discount = $request->discount;

        $reward->save();
        // $input = $request->all();

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
        Reward::destroy($id);

        return redirect('reward')->with('flash_message', 'project deleted!');
    }
}
