<?php

namespace App\Services;

use App\Repositories\Books\BooksRepositoryInterface;
use App\Models\Book;
// use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BooksService
{
    private $booksRepository;

    public function __construct(
        BooksRepositoryInterface $booksRepository
    )

    {
        $this->booksRepository = $booksRepository;
    }

    public function getBooksOfYear($year): Collection
    {
        $books = $this->booksRepository->booksOfYear($year)->with('faculty', 'type', 'month')->orderBy('item', 'asc')->get();

        return $books;
    }

    public function getStatsOfYear($year)
    {
        $books = $this->booksRepository->booksOfYear($year)->get();
        $size = $books->sum('size');
        $sdano = $this->booksRepository->booksOfYearIsHanded($year)->count();
        $perc = $sdano / $books->count() * 100;
        $perc = round($perc);

        $stats = collect([
            'sdano' => $sdano,
            'size' => $size,
            'perc' => $perc,
        ]);

        return $stats;
    }

    public function getDateOfLastUpdatedBook($year)
    {
        return $this->booksRepository->booksOfYear($year)->orderBy('updated_at', 'desc')->first();
    }

    public function getCountOfBooksForBarChart($year)
    {
        for ($i = 1; $i < 10; $i++)
        {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i])->pluck('month_id')->count();
        }
        
        $array = collect($array);

        return $array;
    }

    public function getCountOfHandedBooksForBarChart($year)
    {
        for ($i = 1; $i < 10; $i++)
        {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i])->pluck('is_handed')->sum();
        }
        
        $array = collect($array);

        return $array;
    }
}