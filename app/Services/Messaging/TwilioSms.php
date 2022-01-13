<?php

namespace App\Services\Messaging;

use App\Interfaces\SmsInterface;

use Twilio\Rest\Client as TwilioClient;

class TwilioSms implements SmsInterface
{

    private $senderNumber = null;

    public function __construct($twilioAccountSid, $twilioAuthToken)
    {
        $this->twilioClient = new TwilioClient(
            $twilioAccountSid,
            $twilioAuthToken
        );

        $this->senderNumber = env('TWILIO_NUMBER');
    }

    public function setTwilioSenderNumber(string $senderNumber)
    {
        $this->senderNumber = $senderNumber;
    }

    public function sendSms($to, $message): string
    {
        $messageInstance = $this->twilioClient->messages->create(
            $to,
            ["from" => $this->senderNumber, 'body' => $message]
        );

        return $messageInstance->sid;
    }
}
