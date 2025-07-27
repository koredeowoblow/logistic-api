<?php

namespace App\Models;
use App\Models\Locations\Location;
use App\Models\Transportations\TransportMode;

use Illuminate\Database\Eloquent\Model;

class LogisticBooking extends Model
{
    protected $fillable = [
        'user_id',
        'location_id',
        'transport_mode_id',
        'goods_name',
        'weight',
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'receiver_address',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
    return $this->belongsTo(Location::class);
    }

    public function transportMode()
    {
        return $this->belongsTo(TransportMode::class);
    }



}
