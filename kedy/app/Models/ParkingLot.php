<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingLot extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'location',
        'longitude',
        'latitude',
        'capacity',
        'available_capacity',
        'is_open',
        'type',
        'is_available',
        'has_valet_service',
        'has_cleaning_service',
        'has_electric_car_charging',
    ];

    /**
     * Parking Lot'un vendor ilişkisi
     * Bir Parking Lot sadece bir Vendor'a ait olacaktır
     */
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    /**
     * Parking Lot'un rezervasyon ilişkisi
     * Bir Parking Lot, birden fazla rezervasyona sahip olabilir
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
