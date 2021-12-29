<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Services\BooksService;

class DashboardController extends Controller
{
    private $booksService;

    public function __construct(
        BooksService $booksService
    ) {
        $this->booksService = $booksService;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return redirect()->route('dashboard.year', '2022');
        // return view('dashboard.index');
    }

    /**
     * year
     *
     * @param  mixed $year
     * @return void
     */
    public function year($year)
    {
        $books = $this->booksService->getBooksOfYearWithTrashed($year);

        return view('dashboard.plan', [
            'books' => $books,
            'year' => $year,
            'months' => Month::all(),
        ]);
    }
}
