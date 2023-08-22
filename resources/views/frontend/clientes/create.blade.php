@extends('frontend.layout')
@section('block_main')

<style>
    .input-group .form-control {
   border: 1px solid #ced4da !important;
}
.cedula {
   padding: 19.25px;
}

</style>

<section id="hero" class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="">
                <div id="login">
                    <div class="text-center">
                        <img src="{{ asset('souvenir.png')}}" width="160" height="34" alt="Souvenir logo">
                    </div>
                    <hr>
    <form method="POST" action="{{ route('registrarCliente') }}" class="row">
    @csrf
    <div class="col-md-6">
        <div class="form-group">
            <label for="nombres">Nombre</label>
            <input id="nombres" 
            type="text" 
            class="form-control @error('nombres') is-invalid @enderror" 
            name="nombres" value="{{ old('nombres') }}" 
            required autocomplete="nombre"
             autofocus
             placeholder="Introduce tu nombre"
             >
            @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        

       <div class="form-group">
            <label for="cedula">Cedula</label>
            <div class="input-group ">
                <div class="input-group-prepend">
                    <select class="form-control" id="nacionalidad" name="nacionalidad">
                        <option value="V">V</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <input id="cedula" type="number" 
                class="form-control cedula  @error('cedula') is-invalid @enderror"
                 name="cedula" 
                 value="{{ old('cedula') }}" 
                 required  
                 placeholder="Introduce tu cedula"
                 >
                @error('cedula')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email"
             type="email" 
             class="form-control @error('email') is-invalid @enderror"
              name="email" 
              value="{{ old('email') }}" 
              required 
              autocomplete="email"
              placeholder="Introduce tu correo"
              >
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

         <div class="form-group">
            <label>Password</label>
            <input 
            name="password" 
            type="password" 
            class="form-control @error('password') is-invalid @enderror" 
            id="password1" 
            placeholder="Introduce tu contraseña">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        


    </div>

    <div class="col-md-6">
    <div class="form-group">
            <label for="apellido">Apellido</label>
            <input id="apellido" 
            type="text" 
            class="form-control @error('apellidos') is-invalid @enderror"
             name="apellidos" value="{{ old('apellidos') }}" 
             required autocomplete="apellido" 
             autofocus
             placeholder="Introduce tu apellido"
             >
            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

         <div class="form-group">
            <label for="telefono">Telefono</label>
            <input id="telefono" type="number"
             class="form-control @error('telefono') is-invalid @enderror" 
             name="telefono" value="{{ old('telefono') }}" 
             required 
             autofocus
             placeholder="Introduce tu telefono"
             >
            @error('telefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
       

        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input id="direccion" type="text" 
            class="form-control @error('direccion') is-invalid @enderror"
             name="direccion"
             value="{{ old('direccion') }}" required 
             autofocus
             placeholder="Introduce tu direccion"
             >
            @error('direccion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

         <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" 
            class="form-control @error('password_confirmation') is-invalid @enderror"
             name="password_confirmation" 
             placeholder="password_confirmation"
              required 
              autocomplete="new-password"
              >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        
    </div>

    
    <div id="pass-info" class="clearfix"></div>
    
    <div class="col-md-12">
        <button type="submit" class="btn_full">{{  sc_language_render('Registrar')}}</button>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection