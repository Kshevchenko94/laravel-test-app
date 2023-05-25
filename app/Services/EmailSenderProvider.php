<?php

namespace App\Services;

use App\Interfaces\ISenderProvider;
use Illuminate\Support\Facades\Log;

class EmailSenderProvider implements ISenderProvider
{

    public function send(string $code, string $subject): void
    {
        // TODO: Implement send() method.
        Log::info('The code is send by Email');
    }
}
