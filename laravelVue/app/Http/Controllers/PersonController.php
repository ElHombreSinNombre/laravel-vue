<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;

use Illuminate\Database\QueryException;

class PersonController extends Controller
{

    /**
     * Instantiate a new PersonController instance.
     */
    public function __construct()
    {
        $this->middleware('isAdmin', ['except' => 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $people = Person::join('cars', 'people.id_car', '=', 'cars.id')->select('people.*', 'cars.license')->get();
        if ($request->ajax()){
            return response()->json($people);
        }
        return view('people.index')->withPeople($people);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cars_id= Person::pluck('id_car')->all();
        $cars = Car::whereNotIn('id', $cars_id)->select('model','id')->get();
        if ($request->ajax()){
            return response()->json($cars);
        }
        return view('people.form')->withCars($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        try {
            Person::create($request->all());
            if ($request->ajax()){
                return response()->json('Person created');
            }
        } catch (QueryException $e) {
            if(str_contains($e->getMessage(),'Integrity constraint violation')==true){
                return response()->json(['message' => 'Duplicate unique values'], 500);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Person $person)
    {
        $findPerson = Person::findOrFail($person->id);
        $car = Car::findOrFail($findPerson->id_car);
        $cars_id= Person::pluck('id_car')->all();
        $cars = Car::whereNotIn('id', $cars_id)->select('model','id')->get();
        $result = $cars->merge(collect([$car]));
        if ($request->ajax()){
            return response()->json($result);
        }
        return view('people.form')->withPerson($findPerson)->withCars($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person)
    {
        try {
            Person::findOrFail($person->id)->update($request->all());
            if ($request->ajax()){
                return response()->json('Car updated');
            }
        } catch (QueryException $e) {
            if(str_contains($e->getMessage(),'Integrity constraint violation')==true){
                return response()->json(['message' => 'Duplicate unique values'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Person $person)
    {
        Person::findOrFail($person->id)->delete();
        if ($request->ajax()){
            return response()->json('Person deleted');
        }
    }
}
