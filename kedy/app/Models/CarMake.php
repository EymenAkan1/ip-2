<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // make_id
        'name', // make_display
    ];

    /**
     * Make'ın araç ilişkisi
     * Bir Make birden fazla araca ait olabilir
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'make');
    }
}
