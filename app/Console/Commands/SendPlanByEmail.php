<?php

namespace App\Console\Commands;

use App\Mail\SendPlan;
use App\Services\BooksService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPlanByEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plan:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправляет план на текущий месяц';

    /**
     * booksService
     *
     * @var mixed
     */
    protected BooksService $booksService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        BooksService $booksService
    ) {
        parent::__construct();
        $this->booksService = $booksService;

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $year = date('Y');
        $plan = $this->booksService->getBooksOfCurrentMonth();
        $stats = $this->booksService->getStatsOfYear($year);
// dd($stats);
// Отправляем план ...

        Mail::to('izd-sgu@yandex.ru')->send(new SendPlan($plan, $stats));

    }
}
