<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MailController extends Controller
{
    public function sendMail()
    {
        $apikey = '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';
        $response = Http::withHeaders([
            'api-key' => $apikey,
            'Content-Type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email',[
            'sender' => [
                'name' => 'Staify ',
                'email' => 'staifylaravel@gmail.com ',
            ],
            'to' => [
                ['email' => 'staifylaravel@gmail.com ',]
            ],
            'subject' => 'Achievment is accepted',
            'htmlContent' => '<html><body><h1>your achievment is accepted</h1></body></html>',
        ]);
    if ($response->successful()) 
    {
        return $response->json(['message' => 'Email sent successfully']);

    }
    else
    {
        return $response->json(['error' => 'Failed to send email']);
    }
    }
}
