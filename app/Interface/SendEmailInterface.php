<?php

namespace App\Interface;

interface SendEmailInterface
{
    public function index();

    public function sendEmail($request);

    public function approved($id);
}
