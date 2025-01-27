<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class register extends Authenticatable
{
    use Notifiable;
    // protected $table = 'registers';
    protected $fillable = ['noanggota'];
}
