@extends('layouts.app')

@section('content')
<div class="container mx-auto flex justify-center items-center h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-semibold text-center mb-4">{{ __('Register') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nom') }}</label>
                    <input id="nom" type="text" class="form-input rounded-md shadow-sm @error('nom') border-red-500 @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                    @error('nom')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Prénom') }}</label>
                    <input id="prenom" type="text" class="form-input rounded-md shadow-sm @error('prenom') border-red-500 @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">
                    @error('prenom')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-input rounded-md shadow-sm @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-input rounded-md shadow-sm @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-input rounded-md shadow-sm" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
