<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
//    use HasFactory;
    protected  $table ="tickets";
    protected $fillable = [
        'id',
        'uid',
        'subject',
        'user_name',
        'user_email',
        'created_at',
        'updated_at'
    ];

}

