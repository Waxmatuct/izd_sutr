<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Services\BooksService;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Services\BooksOfFacultyService;

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

    public function yearWithTrashed($year)
    {
        return new
            BookCollection($this->booksService->getBooksOfYearWithTrashed($year));
    }

    public function deleteBook($id)
    {
        return $this->booksService->findBook($id)->delete();
    }

    public function restoreBook($id)
    {
        return $this->booksService->restoreBook($id);
    }

    public function patchStatus(Request $request, $id)
    {
        $book = $this->booksService->findBook($id);

        $book->status = $request->get("newStatus");

        $book->save();
    }
}
