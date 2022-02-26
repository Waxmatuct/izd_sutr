<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\Books\BooksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BooksService
{
    /**
     * booksRepository
     *
     * @var mixed
     */
    private $booksRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        BooksRepositoryInterface $booksRepository
    ) {
        $this->booksRepository = $booksRepository;
    }

    /**
     * findBook
     *
     * @param  mixed $id
     * @return void
     */
    public function findBook($id): Book
    {
        return $this->booksRepository->findBook($id);
    }

    /**
     * getBooksOfYear
     *
     * @param  mixed $year
     * @return EloquentCollection
     */
    public function getBooksOfYear($year): EloquentCollection
    {
        $books = $this->booksRepository->booksOfYear($year)->with('faculty', 'type', 'month')->orderBy('item', 'asc')->get();

        return $books;
    }

    /**
     * getBooksOfYear
     *
     * @param  mixed $year
     * @return EloquentCollection
     */
    public function getBooksOfCurrentMonth(): EloquentCollection
    {
        $books = $this->booksRepository->BooksOfCurrentMonth()->with('faculty', 'type', 'month')->orderBy('item', 'asc')->get();

        return $books;
    }

    /**
     * getBooksOfYear
     *
     * @param  mixed $year
     * @return EloquentCollection
     */
    public function getBooksOfYearWithTrashed($year): EloquentCollection
    {
        $books = $this->booksRepository->booksOfYear($year)->with('faculty', 'type', 'month')->withTrashed()->orderBy('item', 'asc')->get();

        return $books;
    }

    /**
     * getStatsOfYear
     *
     * @param  mixed $year
     * @return Collection
     */
    public function getStatsOfYear($year): Collection
    {
        $books = $this->booksRepository->booksOfYear($year)->get();
        $size = $books->sum('size');
        $sdano_listov = $this->booksRepository->booksOfYearIsHanded($year)->sum('size');
        $sdano = $this->booksRepository->booksOfYearIsHanded($year)->count();
        $perc = $sdano_listov / $size * 100;
        $perc = round($perc);

        $stats = collect([
            'sdano' => $sdano,
            'size' => $size,
            'perc' => $perc,
        ]);

        return $stats;
    }

    /**
     * getDateOfLastUpdatedBook
     *
     * @param  mixed $year
     * @return Book
     */
    public function getDateOfLastUpdatedBook($year): Book
    {
        return $this->booksRepository->booksOfYear($year)->orderBy('updated_at', 'desc')->first();
    }

    /**
     * getCountOfBooksForBarChart
     *
     * @param  mixed $year
     * @return Collection
     */
    public function getCountOfBooksForBarChart($year): Collection
    {
        for ($i = 1; $i < 10; $i++) {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i, 'deleted_at' => null])->pluck('month_id')->count();
        }

        $collection = collect($array);

        return $collection;
    }

    /**
     * getCountOfHandedBooksForBarChart
     *
     * @param  mixed $year
     * @return Collection
     */
    public function getCountOfHandedBooksForBarChart($year): Collection
    {
        for ($i = 1; $i < 10; $i++) {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i, 'deleted_at' => null])->pluck('is_handed')->sum();
        }

        $collection = collect($array);

        return $collection;
    }
}
