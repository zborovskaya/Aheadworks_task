<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class TicketService
{
    public function sendEmail($email)
    {
        Mail::send(['text'=>'mail'], ['name','Add new ticket'],function ($message) use ($email) {
            $message->to($email,'To user')->subject('Ticket is created');
            $message -> from('anna.zborovskaya12@mail.ru','TicketApp' );
        });
    }
}
