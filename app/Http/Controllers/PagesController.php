<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PagesController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('index');
    }

    /**
     * @return Factory|View|Application
     */
    public function about(): Factory|View|Application
    {
        return view('pages.about');
    }

    /**
     * @return Factory|View|Application
     */
    public function help(): Factory|View|Application
    {
        return view('pages.help');
    }

    /**
     * @return Factory|View|Application
     */
    public function paidServices(): Factory|View|Application
    {
        return view('pages.paid-services');
    }

    /**
     * @return Factory|View|Application
     */
    public function blanks(): Factory|View|Application
    {
        return view('pages.blanks');
    }

    public function types(): Factory|View|Application
    {
        return view('pages.types');
    }

    /**
     * @return Application|Factory|View
     */
    public function contacts(): View|Factory|Application
    {
        return view('pages.contacts');
    }

}
