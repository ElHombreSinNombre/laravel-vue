@extends('layouts.base')

@section('content')
<div class="container mx-auto sm:px-4">
    <div class="flex flex-wrap  justify-center">
        <div class="md:w-2/3 pr-4 pl-4">
            <div class="relative shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">{{ __('Login') }}</div>

                <div class="flex-auto p-6">
                    {!! Form::open(['route' => 'login']) !!}
                    @csrf

                    <div class="mb-4 flex flex-wrap ">
                        <label for="name"
                            class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">Email</label>

                        <div class="md:w-1/2 pr-4 pl-4">
                            <input id="name" type="name"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('name') bg-red-700 @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="hidden mt-1 text-sm text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 flex flex-wrap ">
                        <label for="password"
                            class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Password') }}</label>

                        <div class="md:w-1/2 pr-4 pl-4">
                            <input id="password" type="password"
                                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded @error('password') bg-red-700 @enderror"
                                name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="hidden mt-1 text-sm text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 flex flex-wrap ">
                        <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                            <div class="relative block mb-2">
                                <input class="absolute mt-1 -ml-6" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="text-gray-700 pl-6 mb-0" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-wrap  mb-0">
                        <div class="md:w-2/3 pr-4 pl-4 md:mx-1/3">
                            <button type="submit"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline font-normal text-blue-700 bg-transparent"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection