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

    /**
     * Vehicle'ın kullanıcı ilişkisi
     * Bir Vehicle, bir User'a ait olacaktır
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Vehicle'ın markası (Make) ilişkisi
     * Bir Vehicle sadece bir Make'e ait olacaktır
     */
    public function make()
    {
        return $this->belongsTo(Make::class, 'make');
    }

    /**
     * Vehicle'ın modeli (Model) ilişkisi
     * Bir Vehicle sadece bir Model'e ait olacaktır
     */
    public function model()
    {
        return $this->belongsTo(Model::class, 'model');
    }
}
