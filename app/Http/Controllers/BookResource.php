<?php

namespace App\Http\Controllers;

use App\Enums\BookMonthEnum;
use App\Models\Book;
use App\Models\Faculty;
use App\Models\Type;
use App\Services\BooksService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookResource extends Controller
{
    /**
     * booksService
     *
     * @var mixed
     */
    private $booksService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        BooksService $booksService
    ) {
        $this->booksService = $booksService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('dashboard.book.create', [
            'faculties' => Faculty::query()->orderBy('title')->get(),
            'types' => Type::query()->orderBy('title')->get(),
            'months' => BookMonthEnum::keyLabels(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Book::create($request->all());

        return redirect()->route('dashboard.book.create')
            ->with('success', 'Издание успешно добавлено');
    }

    /**
     * edit
     *
     * @param Book $book
     * @return Application|Factory|View
     */
    public function edit(Book $book): View|Factory|Application
    {
        $book = [
            'book' => $this->booksService->findBook($book->id),
            'faculties' => Faculty::all(),
            'types' => Type::all(),
            'months' => BookMonthEnum::keyLabels(),
            'statuses' => ['В работе', 'В печати', 'Отпечатано', 'На калькуляции', 'Издано'],
        ];

//        dd($book);

        return view('dashboard.book.edit', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $this->booksService->findBook($book->id)->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Издание успешно обновлено');
    }

    /**
     * destroy
     *
     * @param mixed $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $this->booksService->findBook($book->id)->delete();

        return redirect()->route('dashboard.year', $book->year)
            ->with('success', 'Запись успешно удалена');
    }
}
