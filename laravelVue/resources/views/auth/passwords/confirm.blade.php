@extends('layouts.base')

@section('content')
<div class="center">
    <div class="w-full max-w-md">
        <div
            class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-12 hover:shadow-2xl transition duration-500 ease-in-out">
            <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4"> {{ __('Confirm Password') }}
            </div>
            {{ __('Please confirm your password before continuing.') }}
            {!! Form::open(['route' => 'password.confirm']) !!}
            @csrf
            @error('name')
            <p class="bg-red-500 text-white py-2 px-5 pr-0 rounded font-bold mb-4 shadow-l">
                {{ $message }}
            </p>
            @enderror
            <div class="mb-6 ">
                <label for="password" class="block text-gray-700 text-sm font-normal mb-2">{{ __('Password') }}</label>
                <input id="password" type="password"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    name="password" required autocomplete="current-password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
                    {{ __('Confirm Password') }}
                </button>
                @if (Route::has('password.request'))
                <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection