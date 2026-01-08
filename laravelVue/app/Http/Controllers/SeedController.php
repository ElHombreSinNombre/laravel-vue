<?php

namespace App\Http\Controllers;

use Artisan;

class SeedController extends Controller
{

    /**
     * Instantiate a new PersonController instance.
     */
    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => 'index']);
    }

    public function seed()
    {
        Artisan::call('migrate:fresh --seed');
        return redirect()->route('choose');
    }

}