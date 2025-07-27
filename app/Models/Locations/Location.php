<?php
namespace App\Models\Locations;

use App\Models\Locations\State;
use App\Models\Locations\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Location extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'locations';
    protected $fillable = [
        'city',
        'state_id',
        'country_id',
        'status',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class); // Assuming Country model
    }
}
