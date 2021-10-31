<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Person extends Model
{
    use HasFactory;

   /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'dni';

   /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
