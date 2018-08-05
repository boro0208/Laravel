<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Laravel';
        return view('pages.index', compact('title'));
        // return view('pages.index')->with('title', $title); drugi nacin slanja parametra 
    }

    public function about(){
        $title = 'About us Page';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Desing', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
