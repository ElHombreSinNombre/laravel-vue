@extends('layouts.base')

@section('content')

<div class="center">
    <div class="w-full max-w-md">
        <div
            class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-12 hover:shadow-2xl transition duration-500 ease-in-out">
            <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4"> {{ __('Reset Password') }}
            </div>
            <div class="mb-6 ">
                @if (session('status'))
                <div class="bg-green-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-l">
                    {{ session('status') }}
                </div>
                @endif
                {!! Form::open(['route' => 'password.email']) !!}
                @csrf
                @error('email')
                <p class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-l">
                    {{ $message }}
                </p>
                @enderror
                <div class="mb-6 ">
                    <label for="email"
                        class="block text-gray-700 text-sm font-normal mb-2">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email"
                        class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
