<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BooksOfFacultyService;
use App\Services\BooksService;
use Illuminate\Http\Request;

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
     * @param mixed $year
     * @return string
     */
    public function year($year): string
    {
        return $this->booksService->getBooksOfYear($year)->toJson();
    }

    public function yearWithTrashed($year)
    {
        return $this->booksService->getBooksOfYearWithTrashed($year);
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
