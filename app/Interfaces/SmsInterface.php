<?php

namespace App\Interfaces;


interface SmsInterface
{
    /**
     * Send an SMS inside the application
     * @param string $to
     * @param string $message
     */
    public function sendSms($to, $message): string;
}
