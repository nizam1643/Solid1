<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendEmail extends Model
{
    use HasFactory;

    protected $table = 'send_emails';

    protected $fillable = [
        'sender_name',
        'sender_email',
        'email_hob',
        'status',
    ];

}
