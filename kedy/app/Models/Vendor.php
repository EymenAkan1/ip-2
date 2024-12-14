<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Kullanıcı ID'si ile ilişkilendiriyoruz
        'name',
        'contact_number1',
        'contact_number2',
        'contact_email',
    ];

    /**
     * Vendor'un kullanıcı ilişkisi
     * Bir Vendor sadece bir User'a bağlıdır
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Vendor'un otopark ilişkisi
     * Bir Vendor birden fazla parking lot oluşturabilir
     */
    public function parkingLots()
    {
        return $this->hasMany(ParkingLot::class);
    }

    /**
     * Vendor'un araç ilişkisi
     * Bir Vendor birden fazla araç ekleyebilir
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'user_id');
    }
}
