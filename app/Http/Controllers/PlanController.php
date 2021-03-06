<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
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

    public function index()
    {
        //
    }

    /**
     * year
     *
     * @param  mixed $year
     * @return void
     */
    public function year($year)
    {
        $books = $this->booksService->getBooksOfYear($year);

        $stats = $this->booksService->getStatsOfYear($year);

        $date = $this->booksService->getDateOfLastUpdatedBook($year);

        $counts = $this->booksService->getCountOfBooksForBarChart($year);

        $is_handed = $this->booksService->getCountOfHandedBooksForBarChart($year);

        if ($year < 2022) {
            $faculties = Faculty::whereNotIn('slug', ['feip', 'fitim', 'none'])->withTrashed()->get();
        } else {
            $faculties = Faculty::where('slug', '!=', 'none')->get();
        }

        return view('pages.plan', [
            'books' => $books,
            'year' => $year,
            'count' => $books->count(),
            'size' => $stats['size'],
            'sdano' => $stats['sdano'],
            'perc' => $stats['perc'],
            'date' => $date,
            'counts' => $counts,
            'is_handed' => $is_handed,
            'faculties' => $faculties,
        ]);
    }

    /**
     * faculty
     *
     * @param  mixed $year
     * @param  mixed $slug
     * @return void
     */
    public function faculty($year, $slug)
    {
        $faculty = $this->booksOfFacultyService->getFaculty($slug);

        $books = $this->booksOfFacultyService->getBooksOfFaculty($year, $faculty->id);

        $stats = $this->booksOfFacultyService->getStatsOfFaculty($year, $faculty->id);

        $date = $this->booksOfFacultyService->getDateOfLastUpdatedBookOfFaculty($year, $faculty->id);

        $counts = $this->booksOfFacultyService->getCountOfBooksOfFacultyForBarChart($year, $faculty->id);

        $is_handed = $this->booksOfFacultyService->getCountOfHandedBooksOfFacultyForBarChart($year, $faculty->id);

        return view('pages.plan-faculty', [
            'books' => $books,
            'faculty' => $faculty,
            'year' => $year,
            'count' => $books->count(),
            'size' => $stats['size'],
            'sdano' => $stats['sdano'],
            'perc' => $stats['perc'],
            'ne_sdano' => $stats['ne_sdano'],
            'date' => $date,
            'counts' => $counts,
            'is_handed' => $is_handed,

        ]);
    }

}
