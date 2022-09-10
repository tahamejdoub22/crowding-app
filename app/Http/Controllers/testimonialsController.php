<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\testimonials;
class testimonialsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $testimonials = testimonials::with('user')->get();
        $user = User::with('testimonials')->get();
        return view ('testimonials.index', compact('testimonials', 'user'))
        ;
    }
    public function test()
    {

        $testimonials = testimonials::with('user')->get();
        $user = User::with('testimonials')->get();
        return view ('project.testimonials', compact('testimonials', 'user'))
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

        return view('testimonials.create')->with('user',$users) ;

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
        $testimonials = new testimonials;
        $testimonials->name = $request->name;
        $testimonials->user_id = $request->user_id;
        $testimonials->text = $request->text;
        $testimonials->displayname = $request->displayname;

        $testimonials->image = $request->image;
        $testimonials->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
       //project::create($input);
        return redirect('testimonials')->with('flash_message', 'Contact Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = testimonials::find($id);

        return view('testimonials.show')->with('testimonials', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = testimonials::find($id);
        $users = User::all();

        return view('testimonials.edit')->with('testimonials', $contact)->with('user',$users);
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
        $testimonials = new testimonials;
        $testimonials = testimonials::find($id);
        $testimonials->name = $request->name;
        $testimonials->user_id = $request->user_id;
        $testimonials->text = $request->text;
        $testimonials->displayname = $request->displayname;

        $testimonials->image = $request->image;
        $testimonials->save();     
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
        return redirect('testimonials')->with('flash_message', 'testimonials Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        testimonials::destroy($id);
        return redirect('testimonials')->with('flash_message', 'project deleted!');
    }
}
