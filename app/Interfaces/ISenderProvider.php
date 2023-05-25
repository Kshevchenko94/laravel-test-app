<?php

namespace App\Interfaces;

interface ISenderProvider
{
    public function send(string $code, string $subject);
}
