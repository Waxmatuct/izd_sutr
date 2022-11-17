<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

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
