<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class SendPlan extends Mailable
{
    use Queueable, SerializesModels;

    protected EloquentCollection|null $plan = null;

    protected Collection|null $stats = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($plan, $stats)
    {
        $this->plan = $plan;
        $this->stats = $stats;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $year = (int) date('Y');
        $m = (int) date('n');
        $month = match ($m) {
            1 => 'январь',
            2 => 'февраль',
            3 => 'март',
            4 => 'апрель',
            5 => 'май',
            6 => 'июнь',
            7 => 'июль',
            8 => 'август',
            9 => 'сентябрь',
            10 => 'октябрь'
        };

        return $this->subject('Рассылка РИЦ: список запланированных изданий на ' . $month)->view('emails.sendplan')
            ->with([
                'year' => $year,
                'month' => $month,
                'stats' => $this->stats,
                'plan' => $this->plan,
            ]);
    }
}
