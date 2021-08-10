<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\Books\BooksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BooksService
{
    private $booksRepository;

    public function __construct(
        BooksRepositoryInterface $booksRepository,
    )

    {
        $this->booksRepository = $booksRepository;
    }

    public function findBook($id)
    {
        return $this->booksRepository->findBook($id);
    }

    public function getBooksOfYear($year): EloquentCollection
    {
        $books = $this->booksRepository->booksOfYear($year)->with('faculty', 'type', 'month')->orderBy('item', 'asc')->get();

        return $books;
    }

    public function getStatsOfYear($year): Collection
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

    public function getDateOfLastUpdatedBook($year): Book
    {
        return $this->booksRepository->booksOfYear($year)->orderBy('updated_at', 'desc')->first();
    }

    public function getCountOfBooksForBarChart($year): Collection
    {
        for ($i = 1; $i < 10; $i++)
        {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i])->pluck('month_id')->count();
        }
        
        $collection = collect($array);

        return $collection;
    }

    public function getCountOfHandedBooksForBarChart($year): Collection
    {
        for ($i = 1; $i < 10; $i++)
        {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i])->pluck('is_handed')->sum();
        }
        
        $collection = collect($array);

        return $collection;
    }
}