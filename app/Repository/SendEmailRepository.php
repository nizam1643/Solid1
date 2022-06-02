<?php

namespace App\Repository;

use App\Interface\SendEmailInterface;
use App\Mail\SendEmail as MailSendEmail;
use App\Models\SendEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailRepository implements SendEmailInterface
{
    public function index()
    {
        return SendEmail::get();
    }

    public function sendEmail($request)
    {
        $sendEmail = new SendEmail();
        $sendEmail->sender_name = $request->sender_name;
        $sendEmail->sender_email = $request->sender_email;
        $sendEmail->email_hob = $request->email_hob;
        $sendEmail->save();

        $details = [
            'id' => $sendEmail->id,
            'sender_name' => $request->sender_name,
            'sender_email' => $request->sender_email,
            'email_hob' => $request->email_hob,
        ];

        Mail::to($request->email_hob)->send(new MailSendEmail($details));

        return $sendEmail;
    }

    public function approved($id)
    {
        $sendEmail = SendEmail::find($id);
        $sendEmail->status = 'approved';
        $sendEmail->save();

        return $sendEmail;
    }
}
