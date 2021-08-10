<?php

namespace App\Repositories\Books;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BooksRepositoryInterface
{
    public function all();

    public function findBook($id);

    public function booksOfYear($year): Builder;

    public function booksOfYearIsHanded($year): Builder;

    public function booksOfFaculty($year, $id): Builder;

    public function booksOfFacultyIsHanded($year, $id): Builder;


}