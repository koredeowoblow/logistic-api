<?php

namespace App\Models\Transportations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class TransportationModeCategory extends Model
{
    //
    use HasFactory, Notifiable;
    protected $fillable=[
        'name',
        'slug',
        'description',
        'status'
    ];
}
