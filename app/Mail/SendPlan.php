<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPlan extends Mailable
{
    use Queueable, SerializesModels;

    public $plan;
    public $stats;
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
        $year = date('Y');
        $m = date('n');
        if ($m == 1) {
            $month = 'январь';
        } elseif ($m == 2) {
            $month = 'февраль';
        } elseif ($m == 3) {
            $month = 'март';
        } elseif ($m == 4) {
            $month = 'апрель';
        } elseif ($m == 5) {
            $month = 'май';
        } elseif ($m == 6) {
            $month = 'июнь';
        } elseif ($m == 7) {
            $month = 'июль';
        } elseif ($m == 8) {
            $month = 'август';
        } elseif ($m == 9) {
            $month = 'сентябрь';
        }

        return $this->subject('Информация: список изданий, запланированных к сдаче за ' . $month . ' по плану издания ' . $year)->view('emails.sendplan')
            ->with([
                'year' => $year,
                'month' => $month,
                'stats' => $this->stats,
            ]);
    }
}
