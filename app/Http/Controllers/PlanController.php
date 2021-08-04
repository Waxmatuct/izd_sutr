<?php

namespace App\Http\Controllers;

use App\Services\BooksOfFacultyService;
use App\Services\BooksService;

class PlanController extends Controller
{

    protected $booksService;
    protected $booksOfFacultyService;
    
    public function __construct(
        BooksService $booksService,
        BooksOfFacultyService $booksOfFacultyService
    )

    {
        $this->booksService = $booksService;
        $this->booksOfFacultyService = $booksOfFacultyService;
    }
    
    public function index() {
        //
    }

    public function year($year)
    {
        $books = $this->booksService->getBooksOfYear($year);
        
        $stats = $this->booksService->getStatsOfYear($year);
        
        $date = $this->booksService->getDateOfLastUpdatedBook($year);

        $counts = $this->booksService->getCountOfBooksForBarChart($year);

        $is_handed = $this->booksService->getCountOfHandedBooksForBarChart($year);
        
        return view('plan', [
            'books' => $books,
            'year' => $year,
            'count'=> $books->count(),
            'size' => $stats['size'],
            'sdano' => $stats['sdano'],
            'perc' => $stats['perc'],
            'date' => $date,
            'counts' => $counts->implode(', ', $counts),
            'is_handed' => $is_handed->implode(', ', $is_handed),
        ]);
    }

    public function faculty($year, $slug) {
        $faculty = $this->booksOfFacultyService->getFaculty($slug);

        $books = $this->booksOfFacultyService->getBooksOfFaculty($year, $faculty->id);
       
        $stats = $this->booksOfFacultyService->getStatsOfFaculty($year, $faculty->id);

        $date = $this->booksOfFacultyService->getDateOfLastUpdatedBookOfFaculty($year, $faculty->id);

        $counts = $this->booksOfFacultyService->getCountOfBooksOfFacultyForBarChart($year, $faculty->id);

        $is_handed = $this->booksOfFacultyService->getCountOfHandedBooksOfFacultyForBarChart($year, $faculty->id);

        return view('plan-faculty', [
            'books' => $books,
            'faculty' => $faculty,
            'year' => $year,
            'count'=> $books->count(),
            'size' => $stats['size'],
            'sdano' => $stats['sdano'],
            'perc' => $stats['perc'],
            'date' => $date,
            'counts' => $counts->implode(', ', $counts),
            'is_handed' => $is_handed->implode(', ', $is_handed),

        ]);
    }
}
