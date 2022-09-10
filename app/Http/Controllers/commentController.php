<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\project;

use App\Models\comment;
class commentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $comment = comment::with('user')->get();
        $comment = comment::with('project')->get();
        $project = project::with('comment')->get();

        $user = User::with('comment')->get();
        return view ('comment.index', compact('comment','project', 'user'))
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
        $projects = project::all();

        return view('comment.create')->with('user',$users)->with('project',$projects) ;

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
        $comment = new comment;
        $comment->name = $request->name;
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;
        $comment->project_id = $request->project_id;
        $comment->image = $request->image;

        $comment->save();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
       //project::create($input);
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
        $contact = comment::find($id);

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
        $contact = comment::find($id);
        $users = User::all();
        $projects = project::all();

        return view('comment.edit')->with('comment', $contact)->with('user',$users)->with('project',$projects);
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
        $comment = new comment;
        $comment = comment::find($id);
        $comment->name = $request->name;
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;
        $comment->project_id = $request->project_id;
        $comment->image = $request->image;

        $comment->save();     
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
        comment::destroy($id);
        return redirect('comment')->with('flash_message', 'comment deleted!');
    }
}
