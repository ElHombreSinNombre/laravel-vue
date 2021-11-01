<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CarDeleted;
//use App\Models\Person;

class CarDeletedMailController extends Controller {
    
    public function email() {

        //Person::findOrFail($person)->delete();
    
        Mail::to('laravelvue@test.com')->send(new CarDeleted);

        return response()->json([
            'message' => 'Email has been sent.'
        ]);
   
    }

}
