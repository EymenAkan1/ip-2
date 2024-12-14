<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'parking_lot_id',
        'vehicle_id',
        'valet_id',
        'start_time',
        'end_time',
        'duration_type',
        'reservation_status',
        'price',
    ];

    /**
     * Reservation'ın müşteri ilişkisi
     * Bir Reservation sadece bir Customer'a ait olabilir
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Reservation'ın park alanı ilişkisi
     * Bir Reservation sadece bir Parking Lot'a ait olabilir
     */
    public function parkingLot()
    {
        return $this->belongsTo(ParkingLot::class, 'parking_lot_id');
    }

    /**
     * Reservation'ın araç ilişkisi
     * Bir Reservation sadece bir araca ait olabilir
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    /**
     * Reservation'ın valet ilişkisi
     * Bir Reservation sadece bir Valet'e ait olabilir
     */
    public function valet()
    {
        return $this->belongsTo(User::class, 'valet_id');
    }
}
