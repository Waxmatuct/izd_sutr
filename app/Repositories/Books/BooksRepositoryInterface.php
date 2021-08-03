<?php

namespace App\Repositories\Books;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface BooksRepositoryInterface
{
    public function all();

    public function booksOfYear($year): Builder;

    public function booksOfYearIsHanded($year): Builder;

}