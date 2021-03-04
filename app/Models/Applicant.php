<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Applicant extends Authenticatable
{
    use Notifiable;

    //protected $table = 'admins';
    protected $guarded = array();
}