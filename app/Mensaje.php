<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mensaje extends Model
{
   // use Notifiable;

    protected $fillable = [
        'nombre', 'mensaje',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
