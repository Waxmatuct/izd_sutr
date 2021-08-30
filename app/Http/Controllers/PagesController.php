<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function help()
    {
        return view('pages.help');
    }

    public function paidServices()
    {
        return view('pages.paid-services');
    }

    public function blanks()
    {
        return view('pages.blanks');
    }

    public function types()
    {
        return view('pages.types');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    
}
