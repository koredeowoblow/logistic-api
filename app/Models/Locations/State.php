<?php

namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class State extends Model
{
    //
      use HasFactory, Notifiable;
     protected $fillable=[

        'name',
        'country_id',
        'status'
     ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

}
