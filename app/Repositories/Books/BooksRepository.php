<?php

namespace App\Repositories\Books;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;

class BooksRepository implements BooksRepositoryInterface
{
    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return Book::all();
    }

    /**
     * findBook
     *
     * @param  mixed $id
     * @return Book
     */
    public function findBook($id): Book
    {
        return Book::all()->find($id);
    }

    /**
     * booksOfYear
     *
     * @param  mixed $year
     * @return Builder
     */
    public function booksOfYear($year): Builder
    {
        return Book::where('year', $year);
    }

    /**
     * booksOfCurrentMonth
     *
     * @param  mixed $year
     * @return Builder
     */
    public function booksOfCurrentMonth(): Builder
    {
        $m = date('n');
        $year = date('Y');
        return Book::where(['year' => $year, 'month_id' => $m]);
    }

    /**
     * booksOfYearIsHanded
     *
     * @param  mixed $year
     * @return Builder
     */
    public function booksOfYearIsHanded($year): Builder
    {
        return Book::where(['year' => $year, 'is_handed' => true]);
    }

    /**
     * booksOfFaculty
     *
     * @param  mixed $year
     * @param  mixed $id
     * @return Builder
     */
    public function booksOfFaculty($year, $id): Builder
    {
        return Book::where(['year' => $year, 'faculty_id' => $id]);
    }

    /**
     * booksOfFacultyIsHanded
     *
     * @param  mixed $year
     * @param  mixed $id
     * @return Builder
     */
    public function booksOfFacultyIsHanded($year, $id): Builder
    {
        return Book::where(['year' => $year, 'is_handed' => true, 'faculty_id' => $id]);

    }

    public function booksOfFacultyNotHanded($year, $id): Builder
    {
        return Book::where(['year' => $year, 'is_handed' => false, 'faculty_id' => $id]);

    }

}
