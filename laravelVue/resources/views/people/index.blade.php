@extends('layouts.base')

<section class="relative py-16 bg-blueGray-50">
    <div class="w-full mb-12 px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded 
      bg-blue-900 text-white">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                        <h3 class="font-semibold text-lg text-white">People</h3>
                    </div>
                </div>
            </div>
            <div class="block w-full overflow-x-auto ">
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="text-white px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blue-800">
                                Name</th>
                            <th
                                class="text-white px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blue-800">
                                Lastname</th>
                            <th
                                class="text-white px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blue-800">
                                Age</th>
                            <th
                                class="text-white px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blue-800">
                                DNI</th>
                            <th
                                class="text-white px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blue-800">
                                Email</th>
                            <th
                                class="text-white px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blue-800">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-white px-6 align-middle">Test</td>
                            <td class="text-white px-6 align-middle">Test</td>
                            <td class="text-white px-6 align-middle">Test</td>
                            <td class="text-white px-6 align-middle">Test</td>
                            <td class="text-white px-6 align-middle">Test</td>
                            <td class="text-white px-6 align-middle"><i
                                    class="cursor-pointer hover:text-blue-200 transition duration-500 ease-in-out fas fa-edit"></i>
                                | <i
                                    class="hover:text-red-200 transition duration-500 ease-in-out cursor-pointer fas fa-trash"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
