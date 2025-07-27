<?php

namespace App\Models\Locations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    use HasFactory, Notifiable;
      protected $table = 'countries';
      protected $fillable=[        
        'name','status'
      ];
}
