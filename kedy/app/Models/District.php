<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id']; // Tablonuzdaki sütunlar

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function towns()
    {
        return $this->hasMany(Town::class);
    }

    public $timestamps = false;

}
