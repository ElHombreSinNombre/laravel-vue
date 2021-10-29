<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $people = Person::all();
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
    public function create()
    {
        return view('people.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        Person::create($request->all());
        if ($request->ajax()){
            return response()->json('Person created');
        }
        return view('people.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Person $person)
    {
        $person = Person::findOrFail($person);
        if ($request->ajax()){
            return response()->json($person);
        }
        return view('people.form')->withPerson($person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Person $person)
    {
        $person = Person::findOrFail($person);
        if ($request->ajax()){
            return response()->json($person);
        }
        return view('people.form')->withPerson($person);
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
        Person::findOrFail($person)->update($request->all());
        if ($request->ajax()){
            return response()->json('Car updated');
        }
        return view('people.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Person $person)
    {
        Person::findOrFail($person)->delete();
        if ($request->ajax()){
            return response()->json('Person deleted');
        }
    }
}
