<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use App\Models\User;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonials::with('user')->get();
        $user = User::with('testimonials')->get();

        return view('testimonials.index', compact('testimonials', 'user'));
    }

    public function test()
    {
        $testimonials = Testimonials::with('user')->get();
        $user = User::with('testimonials')->get();

        return view('project.testimonials', compact('testimonials', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('testimonials.create')->with('user', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
        $testimonials = new Testimonials;
        $testimonials->name = $request->name;
        $testimonials->user_id = $request->user_id;
        $testimonials->text = $request->text;
        $testimonials->displayname = $request->displayname;

        $testimonials->image = $request->image;
        $testimonials->save();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        // project::create($input);
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
        $contact = Testimonials::find($id);

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
        $contact = Testimonials::find($id);
        $users = User::all();

        return view('testimonials.edit')->with('testimonials', $contact)->with('user', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonials = new Testimonials;
        $testimonials = Testimonials::find($id);
        $testimonials->name = $request->name;
        $testimonials->user_id = $request->user_id;
        $testimonials->text = $request->text;
        $testimonials->displayname = $request->displayname;

        $testimonials->image = $request->image;
        $testimonials->save();
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
        Testimonials::destroy($id);

        return redirect('testimonials')->with('flash_message', 'project deleted!');
    }
}
