<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Services\BooksOfFacultyService;
use App\Services\BooksService;

class PlanController extends Controller
{

    /**
     * booksService
     *
     * @var mixed
     */
    protected $booksService;
    /**
     * booksOfFacultyService
     *
     * @var mixed
     */
    protected $booksOfFacultyService;

    public function __construct(
        BooksService $booksService,
        BooksOfFacultyService $booksOfFacultyService
    ) {
        $this->booksService = $booksService;
        $this->booksOfFacultyService = $booksOfFacultyService;
    }

    /**
     * year
     *
     * @param  mixed $year
     * @return void
     */
    public function year($year)
    {
        return new BookCollection($this->booksService->getBooksOfYear($year));
        // return $this->booksService->getBooksOfYear($year);

    }
}
