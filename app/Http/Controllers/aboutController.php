<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\testimonials;
class aboutController extends Controller
{
    public function index()
    {
        $testimonials = testimonials::with('user')->get();
        $user = User::with('testimonials')->get();
        return view('project.about', compact('testimonials', 'user'));

    }
}
