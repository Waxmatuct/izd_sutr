<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Faculty;
use App\Repositories\Books\BooksRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BooksOfFacultyService
{
    private $booksRepository;

    public function __construct(
        BooksRepositoryInterface $booksRepository,
    )

    {
        $this->booksRepository = $booksRepository;
    }

    public function getFaculty($slug): Faculty
    {
        return Faculty::where('slug', $slug)->first();
    }

    public function getBooksOfFaculty($year, $id): Collection
    {
        return  $this->booksRepository->booksOfFaculty($year, $id)
                                            ->with('faculty', 'type', 'month')
                                            ->orderBy('month_id')
                                            ->get();
    }

    public function getStatsOfFaculty($year, $id): Collection
    {
        $books = $this->booksRepository->booksOfFaculty($year, $id)->get();
        $size = $books->sum('size');
        $sdano = $this->booksRepository->booksOfFacultyIsHanded($year, $id)->count();
        $perc = $sdano / $books->count() * 100;
        $perc = round($perc);

        $stats = collect([
            'sdano' => $sdano,
            'size' => $size,
            'perc' => $perc,
        ]);

        return $stats;
    }

    public function getDateOfLastUpdatedBookOfFaculty($year, $id): Book
    {
        return $this->booksRepository->booksOfFaculty($year, $id)->orderBy('updated_at', 'desc')->first();
    }
    
    public function getCountOfBooksOfFacultyForBarChart($year, $id): Collection
    {
        for ($i = 1; $i < 10; $i++)
        {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i, 'faculty_id' => $id])->pluck('month_id')->count();
        }
        
        $collection = collect($array);

        return $collection;
    }

    public function getCountOfHandedBooksOfFacultyForBarChart($year, $id): Collection
    {
        for ($i = 1; $i < 10; $i++)
        {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i, 'faculty_id' => $id])->pluck('is_handed')->sum();
        }
        
        $collection = collect($array);

        return $collection;
    }

}