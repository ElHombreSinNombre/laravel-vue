<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Car extends Model
{
    use HasFactory;

   /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'license';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function people()
    {
        return $this->belongsToMany(User::class);
    }
}