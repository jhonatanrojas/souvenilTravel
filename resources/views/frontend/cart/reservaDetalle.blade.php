@extends('frontend.layout')
@section('block_main')
<section id="hero_2" class="background-image" data-background="url(img/slide_hero_2.jpg)">
    <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
        <div class="intro_title">
            <h1>COMPLETA TU PEDIDO
               </h1>
            <div class="bs-wizard row">

                <div class="col-4 bs-wizard-step disabled">
                    <div class="text-center bs-wizard-stepnum">Tu carrito                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="cart.html" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step disabled ">
                    <div class="text-center bs-wizard-stepnum">Sus datos                    </div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-4 bs-wizard-step  active">
                    <div class="text-center bs-wizard-stepnum">Finalizar!</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="confirmation.html" class="bs-wizard-dot"></a>
                </div>

            </div>
            <!-- End bs-wizard -->
        </div>
        <!-- End intro-title -->
    </div>
    <!-- End opacity-mask-->
</section>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container margin_60">
    <div class="row">
        <div class="col-lg-8 add_bottom_15">

            <div class="form_title">
                <h3><strong><i class="icon-ok"></i></strong>Gracias por Elegirnos!</h3>
                <p>
                   Recibira un correo con nuestros datos
                </p>
            </div>
            <div class="step">
                <p>
                    Verificaremos la disponibilidad y te contactaremos proximamente.
                </p>
            </div>
            <!--End step -->

            <div class="form_title">
                <h3><strong><i class="icon-tag-1"></i></strong>Resumen de la reserva
                </h3>
              
            </div>
            <div class="step">
 

                @foreach (session('carritoCompra') as $cart )
                    
        
                <table class="table table-striped confirm">
                    <thead>
                    
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Item</strong>
                            </td>
                            <td>
                                {{ $cart->name}}                       {{ $cart->quantity}}x
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Fecha</strong>
                            </td>
                            <td>
                                    {{date('d-m-Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Para</strong>
                            </td>
                            <td>
                                {{session('cliente')->nombres}}   {{session('cliente')->apellifod}} 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tipo de Pago</strong>
                            </td>
                            <td>
                              Pendiente
                            </td>
                        </tr>
                    </tbody>
                </table>

                @endforeach
         
            </div>
            <!--End step -->
        </div>
        <!--End col -->

  
    </div>
    <!--End row -->
</div>


@endsection