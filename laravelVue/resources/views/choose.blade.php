@extends('layouts.base')
@section('title') | Choose @endsection

<section id="app">
    <div class="grid md:grid-cols-2 gap-4 place-items-center h-screen w-screen">

        <a href="{{ route('cars.index')}}"
            class="cursor-pointer shadow-md w-6/12 bg-gray-900 rounded-lg shadow-lg p-12 flex flex-col justify-center items-center hover:bg-blue-800 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:shadow-2xl">
            <div class="mb-8">
                <i class="fas fa-car fa-5x text-white"></i> </div>
            <div class="text-center">
                <p class="text-xl text-white font-bold mb-2">Cars</p>
            </div>
        </a>
        <a href="{{ route('people.index')}}"
            class="cursor-pointer shadow-md w-6/12 bg-gray-900 rounded-lg shadow-lg p-12 flex flex-col justify-center items-center hover:bg-green-800 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:shadow-2xl">
            <div class="mb-8">
                <i class="fas fa-user-friends fa-5x text-white"></i> </div>
            <div class="text-center">
                <p class="text-xl text-white font-bold mb-2">People</p>
            </div>
        </a>
        @if(Auth::user()->role=='admin')
        <button v-tooltip="'Refresh data from database'"
            class="text-white fixed bottom-0 right-0 p-0 w-16 h-16 m-4 bg-red-600 rounded-full shadow-md hover:shadow-2xl transition duration-500 ease-in-out hover:border-black border-2 transition duration-500 ease-in-out "><a
                href="{{ route('seed')}}" class="fas fa-database"></a></button>
        @endif
    </div>
</section>
