<?php

namespace App\Repositories\Books;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;

interface BooksRepositoryInterface
{
    public function all();

    public function findBook($id): Book;

    public function booksOfYear($year): Builder;

    public function booksOfCurrentMonth(): Builder;

    public function booksOfYearIsHanded($year): Builder;

    public function booksOfFaculty($year, $id): Builder;

    public function booksOfFacultyIsHanded($year, $id): Builder;

    public function booksOfFacultyNotHanded($year, $id): Builder;
}
