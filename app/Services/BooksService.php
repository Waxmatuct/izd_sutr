<?php

namespace App\Services;

use App\Repositories\Books\BooksRepositoryInterface;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class BooksService
{
    private $booksRepository;

    public function __construct(
        BooksRepositoryInterface $booksRepository
    )

    {
        $this->booksRepository = $booksRepository;
    }

    public function getBooksOfYear($year): Collection
    {
        $books = $this->booksRepository->booksOfYear($year)->with('faculty', 'type', 'month')->orderBy('item', 'asc')->get();

        return $books;
    }

    public function getBooksOfYearIsHanded($year): int
    {
        return $this->booksRepository->booksOfYearIsHanded($year)->count();
    }

    public function getStatsOfYear($year): array
    {
        $books = $this->booksRepository->booksOfYear($year);
        $total = $books->sum('size');
        $sdano = $this->getBooksOfYearIsHanded($year);
        $proc = $sdano / $books->count() * 100;
        $proc = round($proc, 2);

        $stats = array([
            // 'books' => $books,
            'sdano' => $sdano,
            'total' => $total,
            'proc' => $proc,
        ]);

        return $stats[0];

    }

    public function getDateOfLastUpdatedBook($year)
    {
        return $this->booksRepository->booksOfYear($year)->orderBy('updated_at', 'desc')->first();
    }
}