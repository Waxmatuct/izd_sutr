<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\Books\BooksRepositoryInterface;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
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
     * @param $id
     * @return Book
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
    public function getBooksOfYear(int $year): EloquentCollection
    {
        return $this->booksRepository->booksOfYear($year)->with('faculty', 'type', 'month')->orderBy('item', 'asc')->get();
    }

    /**
     * getBooksOfYear
     *
     * @return EloquentCollection
     */
    public function getBooksOfCurrentMonth(): EloquentCollection
    {
        return $this->booksRepository->BooksOfCurrentMonth()->with('faculty', 'type', 'month')->orderBy('item', 'asc')->get();
    }

    /**
     * getBooksOfYear
     *
     * @param  mixed $year
     * @return EloquentCollection
     */
    public function getBooksOfYearWithTrashed(int $year): EloquentCollection
    {
        return $this->booksRepository->booksOfYear($year)->with('faculty', 'type', 'month')->withTrashed()->orderBy('item', 'asc')->get();
    }

    /**
     * getStatsOfYear
     *
     * @param  mixed $year
     * @return Collection
     */
    public function getStatsOfYear(int $year): Collection
    {
        $books = $this->booksRepository->booksOfYear($year)->get();
        $size = $books->sum('size');
        $sdano_listov = $this->booksRepository->booksOfYearIsHanded($year)->sum('size');
        $sdano = $this->booksRepository->booksOfYearIsHanded($year)->count();
        $perc = $sdano_listov / $size * 100;
        $perc = round($perc);
        $published = $this->booksRepository->booksOfYearIsHanded($year)->where(['status' => 'Издано'])->count();
        $in_calculation = $this->booksRepository->booksOfYearIsHanded($year)->where(['status' => 'На калькуляции'])->count();
        $printed = $this->booksRepository->booksOfYearIsHanded($year)->where(['status' => 'Отпечатано'])->count();
        $in_print = $this->booksRepository->booksOfYearIsHanded($year)->where(['status' => 'В печати'])->count();
        $in_work = $this->booksRepository->booksOfYearIsHanded($year)->where(['status' => 'В работе'])->count();

        return collect([
            'sdano' => $sdano,
            'size' => $size,
            'perc' => $perc,
            'published' => $published,
            'in_calculation' => $in_calculation,
            'printed' => $printed,
            'in_print' => $in_print,
            'in_work' => $in_work
        ]);
    }

    /**
     * getDateOfLastUpdatedBook
     *
     * @param mixed $year
     * @return Model
     */
    public function getDateOfLastUpdatedBook(int $year): Model
    {
        return $this->booksRepository->booksOfYear($year)->orderBy('updated_at', 'desc')->first();
    }

    /**
     * getCountOfBooksForBarChart
     *
     * @param  mixed $year
     * @return Collection
     */
    public function getCountOfBooksForBarChart(int $year): Collection
    {
        for ($i = 1; $i < 10; $i++) {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i, 'deleted_at' => null])->pluck('month_id')->count();
        }

        $collection = collect($array);

        $months = collect([
            "Январь",
            "Февраль",
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Cентябрь"
        ]);

        return $months->combine($collection);
    }

    /**
     * getCountOfHandedBooksForBarChart
     *
     * @param  mixed $year
     * @return Collection
     */
    public function getCountOfHandedBooksForBarChart(int $year): Collection
    {
        for ($i = 1; $i < 10; $i++) {
            $array[$i] = DB::table('books')->where(['year' => $year, 'month_id' => $i, 'deleted_at' => null])->pluck('is_handed')->sum();
        }

        $collection = collect($array);

        $months = collect([
            "Январь",
            "Февраль",
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Cентябрь"
        ]);

        return $months->combine($collection);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreBook($id): mixed
    {
        return $this->booksRepository->restoreBook($id);
    }
}
