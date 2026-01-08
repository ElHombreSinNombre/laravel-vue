<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CarDeleted;

use App\Models\Person;
use App\Models\Car;

class CarDeletedMailController extends Controller {

     /**
     * Instantiate a new PersonController instance.
     */
    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => 'index']);
    }

    public function email(Car $car) {

        $user = Person::join('cars', 'cars.id', '=', 'people.id_car')->where('people.id_car','=', $car->id)->get();
        if($user){
            foreach ($user as $data) {
            Mail::to($data->email)->send(new CarDeleted($data->model, $data->image));
            return response()->json([
                'message' => 'Email has been sent to ' .$data->email
            ]);
        }
        }else{
            return response()->json([
                'message' => 'Car does´t have user assigned'
            ]);
        }
    }
}
