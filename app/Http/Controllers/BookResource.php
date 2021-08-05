<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
