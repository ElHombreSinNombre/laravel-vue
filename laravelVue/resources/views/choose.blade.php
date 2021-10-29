@extends('layouts.base')

<section class="flex justify-center ">
    <div class="m:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 flex items-stretch">
        <div class="grid sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-12 place-items-center h-screen w-screen">
            <div
                class="cursor-pointer shadow-md w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center hover:bg-blue-800 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:shadow-2xl">
                <div class="mb-8">
                    <i class="fas fa-car fa-5x text-white"></i> </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">Cars</p>
                </div>
            </div>
            <div
                class="cursor-pointer shadow-md w-full bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center hover:bg-green-800 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:shadow-2xl">
                <div class="mb-8">
                    <i class="fas fa-user-friends fa-5x text-white"></i> </div>
                <div class="text-center">
                    <p class="text-xl text-white font-bold mb-2">People</p>
                </div>
            </div>
        </div>
    </div>
</section>
