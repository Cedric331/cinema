@extends('layouts.app')

@section('stripe')
{!! NoCaptcha::renderJs(str_replace('_', '-', app()->getLocale())) !!}
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email"
                                    class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <label for="phone" class="col-form-label text-md-right">{{ __('Phone') }}</label>
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <hr class="my-4"> --}}

                        {{-- <h5 class="my-2">{{ __('Adresse') }} : </h5>

                        <div class="row">
                            <div class="col">
                                <label for="number"
                                    class="col-form-label text-md-right">{{ __('Street number') }}</label>
                                <input id="number" type="number"
                                    class="form-control @error('number') is-invalid @enderror" name="number"
                                    value="{{ old('number') }}" required autocomplete="number">

                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <label for="adress" class="col-form-label text-md-right">{{ __('Address') }}</label>
                                <input id="adress" type="adress"
                                    class="form-control @error('adress') is-invalid @enderror" name="adress"
                                    value="{{ old('adress') }}" required autocomplete="adress">

                                @error('adress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-8 col-sm-12">
                                <label for="complement_adress" class="col-form-label text-md-right"><em
                                        class="text-danger">*</em>{{ __('Additional address') }}</label>
                                <input id="complement_adress" type="complement_adress"
                                    class="form-control @error('complement_adress') is-invalid @enderror"
                                    name="complement_adress" value="{{ old('complement_adress') }}"
                                    autocomplete="complement_adress">

                                @error('complement_adress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="city" class="col-form-label text-md-right">{{ __('City') }}</label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="code" class="col-form-label text-md-right">{{ __('Postal code') }}</label>
                                <input id="code" type="code" class="form-control @error('code') is-invalid @enderror"
                                    name="code" value="{{ old('code') }}" required autocomplete="code">

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}

                        <hr class="my-4">

                        <div class="row my-2">
                            <div class="col-xl-6 col-sm-12">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-xl-6 col-sm-12">
                                <label for="password-confirm"
                                    class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-center">
                            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
                        </div>

                        <div class="form-group row mt-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-dark">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
