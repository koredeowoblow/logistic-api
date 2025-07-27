<?php

namespace App\Models\Transportations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class TransportMode extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [

        'name',
        'category_id',
        'description_id',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(TransportationModeCategory::class, 'category_id');
    }
}
