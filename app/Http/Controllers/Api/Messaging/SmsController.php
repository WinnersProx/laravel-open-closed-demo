<?php

namespace App\Http\Controllers\Api\Messaging;

use App\Http\Controllers\Controller;
use App\Interfaces\SmsInterface;
use App\Services\Messaging\TwilioSms;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Twilio\Rest\Client as TwilioClient;


class SmsController extends Controller
{

    private SmsInterface $smsProvider;

    public function __construct(SmsInterface $smsProvider)
    {
        $this->smsProvider = $smsProvider;
    }

    public function sendSms(Request $request): JsonResponse
    {
        $messageId = $this->smsProvider->sendSms($request->phone, $request->message);

        return response()->json([
            'success' => true,
            'message' => 'Message successfuly sent!',
            'message_id' => $messageId
        ]);
    }
}
