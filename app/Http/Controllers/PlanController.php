<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Services\BooksOfFacultyService;
use App\Services\BooksService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PlanController extends Controller
{

    /**
     * booksService
     *
     * @var mixed
     */
    protected mixed $booksService;

    /**
     * booksOfFacultyService
     *
     * @var mixed
     */
    protected mixed $booksOfFacultyService;

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
     * @param int $year
     * @return Application|Factory|View
     */
    public function year(int $year): View|Factory|Application
    {
        $books = $this->booksService->getBooksOfYear($year);

        $stats = $this->booksService->getStatsOfYear($year);

        $date = $this->booksService->getDateOfLastUpdatedBook($year);

        $counts = $this->booksService->getCountOfBooksForBarChart($year);

        $is_handed = $this->booksService->getCountOfHandedBooksForBarChart($year);

        if ($year >= 2024) {
            $faculties = Faculty::where('slug', '!=', 'none')->get();
        } else {
            if ($year == 2023) {
                $faculties = Faculty::withTrashed()->whereNotIn('slug', ['uf', 'feipu', 'fiict', 'nic', 'unpi', 'none'])->get();
            } else {
                $faculties = Faculty::withTrashed()->whereNotIn('slug', ['feip', 'fitim', 'fiict', 'nic', 'unpi', 'none'])->get();
            }
        }

        $currentYear = date('Y');
//        $currentYear = 2023;

        $array = [
            'books' => $books,
            'year' => $year,
            'count' => $books->count(),
            'size' => $stats['size'],
            'sdano' => $stats['sdano'],
            'perc' => $stats['perc'],
            'published' => $stats['published'],
            'in_calculation' => $stats['in_calculation'],
            'printed' => $stats['printed'],
            'in_print' => $stats['in_print'],
            'in_work' => $stats['in_work'],
            'date' => $date,
            'counts' => $counts,
            'is_handed' => $is_handed,
            'faculties' => $faculties,
        ];

        return $year == $currentYear ? view('pages.plan', $array) : view('pages.plan-archived', $array);
    }

    /**
     * faculty
     *
     * @param int $year
     * @param mixed $slug
     * @return Application|Factory|View
     */
    public function faculty(int $year, string $slug): View|Factory|Application
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
