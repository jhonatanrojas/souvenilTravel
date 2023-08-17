@extends('frontend.layout')
@section('block_main')

<section id="hero" class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                <div id="login">
                    <div class="text-center">
                        <img src="{{ asset('img/logo_sticky.png')}}" alt="Image" width="160" height="34">
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('registrarCliente') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombre" autofocus>

                            @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password1" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div id="pass-info" class="clearfix"></div>
                        <button type="submit" class="btn_full">Create an account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection