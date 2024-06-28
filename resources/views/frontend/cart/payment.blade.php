@extends('frontend.layout')
@section('block_main')
<section id="hero_2" class="background-image" data-background="url(img/slide_hero_2.jpg)">
    <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
        <div class="intro_title">
            <h1>COMPLETA TU PEDIDO
               </h1>
            <div class="bs-wizard row">

                <div class="col-4 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">Tu carrito                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route('/listCarrito')}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step active">
                    <div class="text-center bs-wizard-stepnum">Sus datos                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum">Finalizar!</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

            </div>
            <!-- End bs-wizard -->
        </div>
        <!-- End intro-title -->
    </div>
    <!-- End opacity-mask-->
</section>
<div class="container margin_60">
    <div class="row">
        <div class="col-lg-8 add_bottom_15">
            <div class="form_title">
                <h3><strong>1</strong></h3>
                <p>
                    Tus datos
                </p>
            </div>
            @if ($errors->any())
            <ul>
              @foreach ($errors->all() as $error)
              <li> {{ $error }}</li>
              @endforeach
            </ul>
            @endif
            
            <form action="{{ route("/registrarReserva") }}" method="post">
                @csrf
            <div class="step">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" type="text" name="nombres" id="nombres" value="{{ old('nombres', '') }}" required>
                            @if($errors->has('nombres'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nombres') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Apellido</label>
                            <input class="form-control" type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', '') }}">
                            @if($errors->has('apellidos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('apellidos') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirme su email</label>
                            <input type="email" id="email_booking_2" name="email2" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Telefono</label>
                            <input class="form-control" type="number" name="telefono" id="telefono" value="{{ old('telefono', '') }}" step="1">
                            @if($errors->has('telefono'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telefono') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" type="text" name="password" id="password" value="{{ old('password', '') }}" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="" id="carritoCompra" name="carritoCompra"> 
            <div id="policy">
                <h4>Política de cancelación</h4>
                <div class="form-group">
                    <label class="container_check">
                        Acepto términos y condiciones y política general.
                        <input type="checkbox" id="terminos_condiciones" name="terminos_condiciones" required>
                        @if($errors->has('terminos_condiciones'))
                        <div class="invalid-feedback">
                            {{ $errors->first('terminos_condiciones') }}
                        </div>
                    @endif
                        <span class="checkmark"></span>
                    </label>
                </div>
                <button type="submit" class="btn_1 green medium">Reservar ahora</button>
            </div>
        </form>
            <!--End step -->

        
        {{--      <div class="step">
                <div class="form-group">
                    <label>Nombre de la tarjeta</label>
                    <input type="text" class="form-control" id="name_card_bookign" name="name_card_bookign">
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Numbero de la tarjeta</label>
                            <input type="text" id="card_number" name="card_number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <img src="img/cards.png" width="207" height="43" alt="Cards" class="cards">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Fecha de expiración</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="expire_month" name="expire_month" class="form-control" placeholder="MM">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="expire_year" name="expire_year" class="form-control" placeholder="Year">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Codigo de seguridad</label>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" id="ccv" name="ccv" class="form-control" placeholder="CCV">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <img src="img/icon_ccv.gif" width="50" height="29" alt="ccv"><small>Last 3 digits</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End row -->

                <hr>

                <h4>O pagar con Paypal</h4>
             
                <p>
                    <img src="img/paypal_bt.png" alt="Image">
                </p>
            </div>
            <!--End step -->

          <div class="form_title">
                <h3><strong>3</strong>Billing Address</h3>
                <p>
                    Mussum ipsum cacilds, vidis litro abertis.
                </p>
            </div>
            <div class="step">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Country</label>
                            <div class="styled-select-common">
                                <select name="country" id="country">
                                    <option value="" selected="">Select your country</option>
                                    <option value="Europe">Europe</option>
                                    <option value="United states">United states</option>
                                    <option value="Asia">Asia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Street line 1</label>
                            <input type="text" id="street_1" name="street_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Street line 2</label>
                            <input type="text" id="street_2" name="street_2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" id="city_booking" name="city_booking" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" id="state_booking" name="state_booking" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label>Postal code</label>
                            <input type="text" id="postal_code" name="postal_code" class="form-control">
                        </div>
                    </div>
                </div>
                <!--End row -->
            </div>--}}
            <!--End step -->

           
        </div>

        <aside class="col-lg-4">
            <div class="box_style_1">
                <h3 class="inner">- Resumen -</h3>
                <table class="table table_summary">
                    <tbody>
                        <tr>
                            <td>
                                Adultos
                            </td>
                            <td class="text-end">
                               1
                            </td>
                        </tr>
                    
                  
                     
                        <tr class="total">
                            <td>
                                Total 
                            </td>
                            <td class="text-end">
                                $154
                            </td>
                        </tr>
                    </tbody>
                </table>
       
                <a class="btn_full_outline" href="{{route('/listCarrito')}}"><i class="icon-right"></i> Regresar</a>
            </div>
      
        </aside>

    </div>
    <!--End row -->
</div>

@push('scripts')
<script>
actualizarCampoOculto()
function actualizarCampoOculto() {
  // Convierte el arreglo a una cadena JSON
  var cartItemsJSON = JSON.stringify(cartItems);

  // Encuentra el campo de entrada oculto por su ID
  var campoOculto = document.getElementById("carritoCompra");

  // Actualiza el valor del campo de entrada oculto
  campoOculto.value = cartItemsJSON;
}

    console.log(cartItems)
</script>
@endpush
@endsection
