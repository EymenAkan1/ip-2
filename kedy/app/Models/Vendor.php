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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parkingLots()
    {
        return $this->hasMany(ParkingLot::class, 'vendor_id');
    }

}
