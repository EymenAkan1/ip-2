<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'make_id', // Make ile ilişkilendirilir
        'name', // Model adı
        'year', // Model yılı
    ];

    /**
     * Model'ın make ilişkisi
     * Bir Model sadece bir Make'e ait olacaktır
     */
    public function make()
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    /**
     * Model'ın araç ilişkisi
     * Bir Model birden fazla araca ait olabilir
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'model');
    }
}
