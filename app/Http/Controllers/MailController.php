<?php

namespace App\Http\Controllers;

use App\Mail\SendPlan;
use App\Services\BooksOfFacultyService;
use App\Services\BooksService;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * booksService
     *
     * @var mixed
     */
    protected $booksService;
    /**
     * booksOfFacultyService
     *
     * @var mixed
     */
    protected $booksOfFacultyService;

    public function __construct(
        BooksService $booksService,
        BooksOfFacultyService $booksOfFacultyService
    ) {
        $this->booksService = $booksService;
        $this->booksOfFacultyService = $booksOfFacultyService;
    }

    public function sendPlan()
    {
        $year = date('Y');
        $plan = $this->booksService->getBooksOfCurrentMonth();
        $stats = $this->booksService->getStatsOfYear($year);
        // dd($stats);
        // Отправляем план ...

        Mail::to('pletnevsochi@yandex.ru')->send(new SendPlan($plan, $stats));
    }
}
