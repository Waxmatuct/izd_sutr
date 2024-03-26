<?php

namespace App\Services;

use App\Models\Faculty;
use App\Repositories\Books\BooksRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BooksOfFacultyService
{
    private $booksRepository;

    /**
     * @param BooksRepositoryInterface $booksRepository
     */
    public function __construct(
        BooksRepositoryInterface $booksRepository
    ) {
        $this->booksRepository = $booksRepository;
    }

    /**
     * @param $slug
     * @return Faculty
     */
    public function getFaculty($slug): Faculty
    {
        return Faculty::where('slug', $slug)->withTrashed()->first();
    }

    /**
     * @param $year
     * @param $id
     * @return Collection
     */
    public function getBooksOfFaculty($year, $id): Collection
    {
        return $this->booksRepository->booksOfFaculty($year, $id)
            ->with('faculty', 'type')
            ->orderBy('month_id')
            ->get();
    }

    /**
     * @param $year
     * @param $id
     * @return Collection
     */
    public function getStatsOfFaculty($year, $id): Collection
    {
        $books = $this->booksRepository->booksOfFaculty($year, $id)->get();
        $size = $books->sum('size');
        $sdano = $this->booksRepository->booksOfFacultyIsHanded($year, $id)->count();
        $sdano_listov = $this->booksRepository->booksOfFacultyIsHanded($year, $id)->sum('size');
        $ne_sdano = $this->booksRepository->booksOfFacultyNotHanded($year, $id)->sum('size');
        $perc = $sdano_listov / $size * 100;
        $perc = round($perc);

        $stats = collect([
            'sdano' => $sdano,
            'size' => $size,
            'perc' => $perc,
            'ne_sdano' => $ne_sdano,
        ]);

        return $stats;
    }

    /**
     * @param $year
     * @param $id
     * @return Model
     */
    public function getDateOfLastUpdatedBookOfFaculty($year, $id): Model
    {
        return $this->booksRepository->booksOfFaculty($year, $id)->orderBy('updated_at', 'desc')->first();
    }

    /**
     * @param $year
     * @param $id
     * @return Collection
     */
    public function getCountOfBooksOfFacultyForBarChart($year, $id): Collection
    {
        if ($year == 2024) {
            for ($i = 2; $i < 11; $i++) {
                $array[$i] = DB::table('books')->where(
                    ['year' => $year, 'month_id' => $i, 'faculty_id' => $id, 'deleted_at' => null]
                )->pluck('month_id')->count();
            }

            $months = collect([
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Cентябрь",
                "Октябрь"
            ]);
        } else {
            for ($i = 1; $i < 10; $i++) {
                $array[$i] = DB::table('books')->where(
                    ['year' => $year, 'month_id' => $i, 'faculty_id' => $id, 'deleted_at' => null]
                )->pluck('month_id')->count();
            }

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
        }
        $collection = collect($array);

        $combined = $months->combine($collection);

        return $combined;
    }

    /**
     * @param $year
     * @param $id
     * @return Collection
     */
    public function getCountOfHandedBooksOfFacultyForBarChart($year, $id): Collection
    {
        if ($year == 2024) {
            for ($i = 2; $i < 11; $i++) {
                $array[$i] = DB::table('books')->where(
                    ['year' => $year, 'month_id' => $i, 'faculty_id' => $id, 'deleted_at' => null]
                )->pluck('is_handed')->sum();
            }

            $months = collect([
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Cентябрь",
                "Октябрь"
            ]);
        } else {
            for ($i = 1; $i < 10; $i++) {
                $array[$i] = DB::table('books')->where(
                    ['year' => $year, 'month_id' => $i, 'faculty_id' => $id, 'deleted_at' => null]
                )->pluck('is_handed')->sum();
            }

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
        }

        $collection = collect($array);

        $combined = $months->combine($collection);

        return $combined;
    }
}
