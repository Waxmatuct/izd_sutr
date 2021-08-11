<?php

namespace App\Repositories\Books;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BooksRepository implements BooksRepositoryInterface
{
    public function all()
    {
        return Book::all();
    }

    public function findBook($id)
    {
        return Book::all()->find($id);
    }

    public function booksOfYear($year): Builder
    {
        return Book::where('year', $year);
    }

    public function booksOfYearIsHanded($year): Builder
    {
        return Book::where(['year' => $year, 'is_handed' => true]);
    }

    public function booksOfFaculty($year, $id): Builder
    {
        return Book::where(['year' => $year, 'faculty_id' => $id]);
    }

    public function booksOfFacultyIsHanded($year, $id): Builder
    {
        return Book::where(['year' => $year, 'is_handed' => true, 'faculty_id' => $id]);

    }

}