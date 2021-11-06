<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Person extends Model
{
    use HasFactory;
    
   /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function cars()
    {
        return $this->hasOne(Car::class,'id_car');
    }
}
