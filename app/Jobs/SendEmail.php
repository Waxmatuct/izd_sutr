<?php

namespace App\Jobs;

use App\Mail\SendPlan;
use App\Services\BooksService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected EloquentCollection|null $plan = null;

    protected Collection|null $stats = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(BooksService $booksService)
    {
        $year = date('Y');
        $plan = $booksService->getBooksOfCurrentMonth();
        $stats = $booksService->getStatsOfYear($year);
        Mail::to('izd-sgu@yandex.ru')->send(new SendPlan($plan, $stats));
    }
}
