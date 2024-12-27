<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('welcome', compact('questions'));
    }

    public function contact()
    {
        return view('contact.contact');
    }   
}