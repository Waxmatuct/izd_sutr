<?php

namespace App\Repositories\Books;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class BooksRepository implements BooksRepositoryInterface
{
    public function all()
    {
        return Book::all();
    }

    public function booksOfYear($year): Builder
    {
        return Book::where('year', $year);
    }

    public function booksOfYearIsHanded($year): Builder
    {
        return Book::where(['year' => $year, 'is_handed' => true]);
    }

}