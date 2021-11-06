<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;

use Illuminate\Database\QueryException;

class CarController extends Controller
{

    /**
     * Instantiate a new CarController instance.
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
        $cars = Car::join('people', 'cars.id', '=', 'people.id_car')->select('cars.*', 'people.name','people.dni')->get();
        if ($request->ajax()){
            return response()->json($cars);
        }
        return view('cars.index')->withCars($cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        try {
            Car::create($request->all());
            if ($request->ajax()){
                return response()->json('Car created');
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
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Car $car)
    {
        $findCar = Car::findOrFail($car->id);
        if ($request->ajax()){
            return response()->json($findCar);
        }
        return view('cars.form')->withCar($findCar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        try {
            Car::findOrFail($car->id)->update($request->all());
            if ($request->ajax()){
                return response()->json('Car updated');
            }
            $cars = Car::join('people', 'cars.id', '=', 'people.id_car')->select('cars.*', 'people.name','people.dni')->get();
        } catch (QueryException $e) {
            if(str_contains($e->getMessage(),'Integrity constraint violation')==true){
                return response()->json(['message' => 'Duplicate unique values'], 500);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Car $car)
    {
        Car::findOrFail($car->id)->delete();
        if ($request->ajax()){
            return response()->json('Car deleted');
        }
    }
}
