<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Interface\SendEmailInterface;
use App\Repository\SendEmailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SendEmailController extends Controller
{
    public $sendEmail;

    public function __construct(SendEmailRepository $sendEmail)
    {
        $this->sendEmail = $sendEmail;
    }

    public function index()
    {
        $sendEmails = $this->sendEmail->index();
        return View::make('email.index', compact('sendEmails'));
    }

    public function sendEmail(SendEmailRequest $request)
    {
        try {
            $this->sendEmail->sendEmail($request);
            return redirect()->route('email.index')->with('success', 'Email sent successfully');
        } catch (\Exception $e) {
            return redirect()->route('email.index')->with('error', 'Email not sent');
        }
    }

    public function approved($id)
    {
        try {
            $this->sendEmail->approved($id);
            return 'Email approved successfully';
        } catch (\Exception $e) {
            return 'Email not approved';
        }
    }
}
