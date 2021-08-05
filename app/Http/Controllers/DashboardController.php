<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Books\BooksRepositoryInterface;
use App\Services\BooksService;

class DashboardController extends Controller
{
    private $booksRepository;
    private $booksService;

    public function __construct(
        BooksRepositoryInterface $booksRepository,
        BooksService $booksService
    )

    {
        $this->booksRepository = $booksRepository;
        $this->booksService = $booksService;
    }
    
    public function index() 
    {
        return view('dashboard.index');
    }

    public function year($year)
    {
        $books = $this->booksService->getBooksOfYear($year);

        return view('dashboard.plan', [
            'books' => $books,
            'year' => $year,
        ]);
    }
}
