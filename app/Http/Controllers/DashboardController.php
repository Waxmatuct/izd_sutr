<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Services\BooksService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{

    protected BooksService $booksService;

    /**
     * Конструктор сервис-контейнера
     *
     * @param BooksService $booksService
     */
    public function __construct(
        BooksService $booksService
    ) {
        $this->booksService = $booksService;
    }

    /**
     * Стартовая дашборда
     *
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('dashboard.year', '2023');
    }

    /**
     * Вывод плана по году
     *
     * @param int $year
     * @return View
     */
    public function year(int $year): View
    {
        $books = $this->booksService->getBooksOfYearWithTrashed($year);

        return view('dashboard.plan', [
            'books' => $books,
            'year' => $year,
            'months' => Month::all(),
        ]);
    }
}
