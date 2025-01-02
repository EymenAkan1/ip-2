<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'car_models';
    protected $fillable = ['id', 'make_id', 'model_name'];

    public function make()
    {
        return $this->belongsTo(CarMake::class, 'make_id', 'id');
    }
}
