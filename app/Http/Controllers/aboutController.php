<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use App\Models\User;

class AboutController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::with('user')->get();
        $user = User::with('testimonials')->get();

        return view('project.about', compact('testimonials', 'user'));
    }
}
