@extends('layouts.base')

@section('content')
<div class="center">
    <div class="w-full max-w-md">
        <div
            class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-12 hover:shadow-2xl transition duration-500 ease-in-out">
            <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4"> {{ __('Reset Password') }}
            </div>
            {!! Form::open(['route' => 'password.update']) !!}
            @csrf
            @error('name')
            <p class="bg-red-500 text-white py-2 px-5 pr-0 rounded font-bold mb-4 shadow-l">
                {{ $message }}
            </p>
            @enderror
            @error('password')
            <p class="bg-red-500 text-white py-2 px-5 pr-0 rounded font-bold mb-4 shadow-l">
                {{ $message }}
            </p>
            @enderror
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-6 ">
                <label for="email"
                    class="block text-gray-700 text-sm font-normal mb-2">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="email" value="{{ old('name') }}" required autocomplete="email">
            </div>
            <div class="mb-6 ">
                <label for="password" class="block text-gray-700 text-sm font-normal mb-2">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    name="password" required autocomplete="new-password">

            </div>
            <div class="mb-6 ">
                <label for="password-confirm"
                    class="block text-gray-700 text-sm font-normal mb-2">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
                    {{ __('Reset Password') }}
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
