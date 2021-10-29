<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CarDeleted;

class CarDeletedMailController extends Controller {
    
    public function email() {
    

        Mail::to('laraasier@gmail.com')->send(new CarDeleted);

        return response()->json([
            'message' => 'Email has been sent.'
        ]);
   
    }

}
