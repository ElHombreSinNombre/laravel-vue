<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\CarDeleted;

use App\Models\Person;

class CarDeletedMailController extends Controller {

     /**
     * Instantiate a new PersonController instance.
     */
    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => 'index']);
    }

    public function email(Person $person) {

        $users = Person::join('cars', 'cars.id', '=', 'people.id_car')->where('people.id_car', $person->id_car)->get();
        if($users){
            foreach ($users as $user) {
                Mail::to($user->email)->send(new CarDeleted($user->model));
                return response()->json([
                    'message' => 'Email has been sent to ' .$user->email
                ]);
            }
        }
     
    }

}
