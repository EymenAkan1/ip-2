<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plate',
        'make',
        'model',
        'year',
        'color',
        'type',
        'fuel_type',
        'is_suv',
        'is_electric',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function make()
    {
        return $this->belongsTo(CarMake::class, 'make_id');
    }


    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }
}
