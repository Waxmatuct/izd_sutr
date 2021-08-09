<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Faculty;
use App\Models\Month;
use App\Models\Type;
use App\Repositories\Books\BooksRepositoryInterface;
use App\Services\BooksService;
use Illuminate\Http\Request;

class BookResource extends Controller
{
    private $booksRepository;
    private $booksService;

    public function __construct(
        BooksRepositoryInterface $booksRepository,
        BooksService $booksService
    )

    {
        $this->booksRepository = $booksRepository;
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
            'faculties' => Faculty::all(),
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
        $request->validate([
            'item' => 'required',
            'faculty_id' => 'required',
            'author' => 'required',
            'title' => 'required',
            'type_id' => 'required',
            'disciple' => 'required',
            'size' => 'required',
            'amount' => 'required',
            'month_id' => 'required',
        ]);

        Book::create([
            'item' => $request->get('item'),
            'faculty_id' => $request->get('faculty_id'),
            'author' => $request->get('author'),
            'title' => $request->get('title'),
            'type_id' => $request->get('type_id'),
            'disciple' => $request->get('disciple'),
            'size' => $request->get('size'),
            'amount' => $request->get('amount'),
            'month_id' => $request->get('month_id'),
            'year' => date("Y"),
        ]);

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $id)
    {
        $this->booksRepository->findBook($id)->delete();
        
        // return redirect()->route('posts.index')
        //     ->with('success', 'Запись успешно удалена');

    }
}
