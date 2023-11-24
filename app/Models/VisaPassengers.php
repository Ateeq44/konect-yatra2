<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaPassengers extends Model
{
    use HasFactory;
    protected $table='visa_passengers';
    protected $guarded = [];

    public function package(){
        return $this->belongsTo('App\Models\Package', 'package_id');
    }

    public function gurdwara(){
        return $this->belongsTo('App\Models\Gurdwara', 'gurdwara_id');
    }

    public function hotel(){
        return $this->belongsTo('App\Models\Hotels', 'hotel_id');
    }

    public function bus(){
        return $this->belongsTo('App\Models\Bus', 'bus_id');
    }
}
