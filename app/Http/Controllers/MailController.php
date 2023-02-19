<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\RedirectResponse;

class MailController extends Controller
{

    /**
     * Отправляем почту в очередь
     *
     * @return RedirectResponse
     */
    public function __invoke(): RedirectResponse
    {
        SendEmail::dispatch()->onQueue('email');

        return redirect()->route('dashboard.index');
    }
}
