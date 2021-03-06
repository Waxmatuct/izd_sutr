<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Faculty;
use App\Models\Month;
use App\Models\Type;
use App\Services\BooksService;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.book.create', [
            'faculties' => Faculty::get(),
            'types' => Type::all(),
            'months' => Month::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'item' => 'required',
        //     'faculty_id' => 'required',
        //     'author' => 'required',
        //     'title' => 'required',
        //     'type_id' => 'required',
        //     'disciple' => 'required',
        //     'size' => 'required',
        //     'amount' => 'required',
        //     'month_id' => 'required',
        // ]);

        // dd($request->all());
        Book::create($request->all());

        return redirect()->route('dashboard.book.create')
            ->with('success', 'Издание успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit(Book $book)
    {
        $book = [
            'book' => $this->booksService->findBook($book),
            'faculties' => Faculty::get(),
            'types' => Type::all(),
            'months' => Month::all(),
            'statuses' => ['В работе', 'В печати', 'Отпечатано', 'На калькуляции', 'Издано'],
        ];

        return view('dashboard.book.edit', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->booksService->findBook($book)->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Издание успешно обновлено');
    }

    /**
     * destroy
     *
     * @param  mixed $book
     * @return void
     */
    public function destroy(Book $book)
    {
        $this->booksService->findBook($book)->delete();

        return redirect()->route('dashboard.year', $book->year)
            ->with('success', 'Запись успешно удалена');
    }
}
