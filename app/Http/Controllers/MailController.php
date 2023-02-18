<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\RedirectResponse;

class MailController extends Controller
{
    public function sendPlan(): RedirectResponse
    {
        SendEmail::dispatch()->onQueue('email');

        return redirect()->route('dashboard.index');
    }
}
