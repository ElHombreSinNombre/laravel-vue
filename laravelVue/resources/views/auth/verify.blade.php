@extends('layouts.base')

@section('content')
<div class="center h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-12 hover:shadow-2xl transition duration-500 ease-in-out">
            <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">{{ __('Verify Your Email Address') }} </div>
            <div class="mb-6 ">
                @if (session('resent'))
                    <div class="bg-green-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-l">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                @endif
                {!! Form::open(['route' => 'verification.resend']) !!}
                @csrf
                <button type="submit"
                    class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">{{ __('click here to request another') }}</button>.
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection