<?php

namespace App\Http\Controllers;
use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $ab = About::paginate(1);
        
        return view('client.about.index', compact('ab'));
    }
}
