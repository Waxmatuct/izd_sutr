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
        // $plan = new BookCollection($this->booksService->getBooksOfYear($year));
        $plan = $this->booksService->getBooksOfYear($year)->toJson();
        // dd($plan);
        return $plan;
    }

    public function yearWithTrashed($year)
    {
        return $this->booksService->getBooksOfYearWithTrashed($year)->toJson();
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
