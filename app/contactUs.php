<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'name','email','message',
    ];
}
