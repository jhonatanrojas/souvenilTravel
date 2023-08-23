<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Souvenir">
    <meta property="og:url" content="{{ \Request::fullUrl() }}" />
    <link rel="canonical" href="{{ request()->url() }}" />
    <title>Souvenir</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('template/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="{{ asset('template/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="{{ asset('template/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('template/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('template/img/apple-touch-icon-144x144-precomposed.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- GOOGLE WEB FONT -->
    <link
        href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        


    <!-- COMMON CSS -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendors.css') }}" rel="stylesheet">

    <!-- CUSTOM CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('template/css/colors/color-morado.css') }}" rel="stylesheet">
    <style>
        #logo_home h1 a,
        header.sticky #logo_home h1 a,
        header#plain #logo_home h1 a,
        header#colored #logo_home h1 a {
            width: 160px;
            height: 34px;
            display: block;
            background-image: url({{ asset('souvenir.png') }});
            background-repeat: no-repeat;
            background-position: left top;
            background-size: 160px 34px;
            text-indent: -9999px;
        }

        header.sticky #logo_home h1 a {
            background-image: url({{ asset('souvenir.png') }});
        }

        header#plain #logo_home h1 a {
            background-image: url({{ asset('souvenir.png') }});
        }

        header.sticky#colored #logo_home h1 a {
            background-image: url({{ asset('souvenir.png') }});
        }

        header.sticky #logo_home h1 {
            margin: 0 0 10px 0;
            padding: 0;
        }

        @media only screen and (min--moz-device-pixel-ratio: 2),
        only screen and (-o-min-device-pixel-ratio: 2/1),
        only screen and (-webkit-min-device-pixel-ratio: 2),
        only screen and (min-device-pixel-ratio: 2) {

            #logo_home h1 a,
            header#colored #logo_home h1 a {
                background-image: url(../img/logo_2x.png);
                background-size: 160px 34px;
            }

            header.sticky #logo_home h1 a,
            header#plain #logo_home h1 a {
                background-image: url(../img/logo_sticky_2x.png);
                background-size: 160px 34px;
            }

            header.sticky#colored #logo_home h1 a {
                background-image: url(../img/logo_sticky_colored_2x.png);
                background-size: 160px 34px;
            }
        }
    </style>
    @stack('styles')
</head>

<body class="datepicker_mobile_full"> <!-- Remove this class to disable datepicker full on mobile -->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    @section('block_header')
        @include('frontend.block_header')
    @show
    <!-- End Header -->



    @section('banner_top')
        <!--  search_container -->
        @includeIf('frontend.common.render_block', ['positionBlock' => 'banner_top'])

    @show
    <!-- End search_container -->

    <main>

        @section('block_top')
            @include('frontend.block_top')


        @section('block_main')

            <section class="section section-xxl bg-default text-md-left">
                <div class="container">
                    <div class="row row-50">
                    @section('block_main_content')

                        @php
                            $sc_templatePath = 'frontend';
                            $sc_blocksContent = listBloques();
                            
                            $hasLeftBlock = false;
                            
                            if (isset($sc_blocksContent['left'])) {
                                foreach ($sc_blocksContent['left'] as $block) {
                                    $pages = explode(',', $block->pagina);
                            
                                    if ($block->pagina == '*' || (isset($layout_page) && in_array($layout_page, $pages))) {
                                        $hasLeftBlock = true;
                                        break;
                                    }
                                }
                            }
                            
                        @endphp



                        @if ($hasLeftBlock)
                            <!--Block left-->
                            <div class="col-lg-3  d-none d-md-block">
                                @section('block_main_content_left')

                                    @include($sc_templatePath . '.block_main_content_left')

                                @show
                            </div>
                            <!--//Block left-->
                        @endif

                        <!--Block center-->


                        <div
                            class="@if ($hasLeftBlock > 0) col-12 col-md-12 col-lg-9 @else col-12 col-lg-12 col-xl-12 @endif">

                        @section('block_main_content_center')
                            @include($sc_templatePath . '.block_main_content_center')
                        @show
                    </div>
                    <!--//Block center-->


                    @if (empty($hiddenBlockRight))
                        <!--Block right -->
                        @section('block_main_content_right')
                            @include($sc_templatePath . '.block_main_content_right')
                        @show
                        <!--//Block right -->
                    @endif

                @show
            </div>
        </div>
    </section>
@show
{{-- //Block main --}}



</main>
<!-- End main -->

<footer class="revealed">
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Need help?</h3>
            <a href="tel://004542344599" id="phone">+45 423 445 99</a>
            <a href="mailto:help@citytours.com" id="email_footer">help@citytours.com</a>
        </div>
        <div class="col-md-3">
            <h3>About</h3>
            <ul>
                <li><a href="#">About us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Terms and condition</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <h3>Discover</h3>
            <ul>
                <li><a href="#">Community blog</a></li>
                <li><a href="#">Tour guide</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Gallery</a></li>
            </ul>
        </div>
        <div class="col-md-2">
            <h3>Settings</h3>
            <div class="styled-select">
                <select name="lang" id="lang">
                    <option value="English" selected>English</option>
                    <option value="French">French</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Russian">Russian</option>
                </select>
            </div>
            <div class="styled-select">
                <select name="currency" id="currency">
                    <option value="USD" selected>USD</option>
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="RUB">RUB</option>
                </select>
            </div>
        </div>
    </div><!-- End row -->
    <div class="row">
        <div class="col-md-12">
            <div id="social_footer">
                <ul>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-google"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-vimeo"></i></a></li>
                    <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                </ul>
                <p>© Citytours 2022</p>
            </div>
        </div>
    </div><!-- End row -->
</div><!-- End container -->
</footer><!-- End footer -->

<div id="toTop"></div><!-- Back to top button -->

<!-- Search Menu -->
<div class="search-overlay-menu">
<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
<form role="search" id="searchform" method="get">
    <input value="" name="q" type="text" placeholder="Search..." />
    <button type="submit"><i class="icon_set_1_icon-78"></i>
    </button>
</form>
</div><!-- End Search Menu -->

<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
<div class="small-dialog-header text-center">
    <img src="{{ asset('souvenir.png')}}" width="160" height="34" alt="Souvenir logo">
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="sign-in-wrapper">
        
         <!--
         <a href="#0" class="social_bt facebook">Login with Facebook</a>
          
          -->
          <a href="#0" class="social_bt google">Incia session con  Google</a>
       
        <div class="divider"><span>Or</span></div>
        <div class="form-group">
            <label>Correo</label>
            <input required type="email" class="form-control" name="email" id="email">
            <i class="icon_mail_alt"></i>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input required type="password" class="form-control" name="password" id="password" value="">
            <i class="icon_lock_alt"></i>
        </div>
        <div class="clearfix add_bottom_15">
            <div class="checkboxes float-start">
                <label class="container_check">Acuérdate de mí
                    <input type="checkbox" name="remember">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="float-end"><a id="" href="#">Has olvidado tu contraseña?</a></div>
        </div>
        <div class="text-center"><button type="submit" class="btn_login">Iniciar sesión</button></div>
        <div class="text-center">
            No tengo una cuenta? <a href="{{ route('registraCliente') }}">registrate</a>
        </div>
        <div id="forgot_pw">
            <div class="form-group">
                <label>Confirme el correo electrónico de inicio de sesión a continuación</label>
                <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                <i class="icon_mail_alt"></i>
            </div>
            <p>You will receive an email containing a link allowing you to reset your password to a new
                preferred one.</p>
            <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
        </div>
    </div>

        <script>
    @if(session('error_message'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error_message') }}',
        });
    @endif
</script>
</form>
<!--form -->
</div>
<!-- /Sign In Popup -->

<!-- Common scripts -->
<script src="{{ asset('template/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('template/js/common_scripts_min.js') }}"></script>
<script src="{{ asset('template/js/functions.js') }}"></script>

<!-- DATEPICKER  -->
<script>
    $(function() {
        'use strict';
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            minDate: new Date(),
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format(
                'MM-DD-YY'));
        });
        $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });



</script>

<!-- Input quantity  -->


<!-- Autocomplete -->
<script>
    function initMap() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap">
</script>

<script>


    document.addEventListener('DOMContentLoaded', () => {
        let cartItemsElement = document.getElementById('cartItems');
        const cartItemCountElement = document.getElementById('cartItemCount');
        const cartTotalElement = document.getElementById('cartTotal');

        // Obtener productos del localStorage o inicializar un array vacío
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        // Función para actualizar el carrito en el HTML y localStorage
        function updateCart() {
            let innerHTML=''
            cartItemsElement.innerHTML =``;
            let total = 0;

            cartItems.forEach(item => {
  
                innerHTML += `<li>
              
                              
             
              <strong><a href="#" class="text-dark">${item.name}</a> ${item.quantity}x $${item.price.toFixed(2)}</strong>
              <a href="#" class="action delete-item" data-id="${item.id}"><i class="icon-trash text-dark"></i></a></li>
          `;
            
                total += item.price * item.quantity;
            });

            innerHTML  +=` <li>
                                    <div>Total: <span id="cartTotal">$${total.toFixed(2)}</span></div>
                                    <a href="cart.html" class="button_drop">Ir al carrito</a>
                                    <a href="payment.html" class="button_drop outline">Reservar</a>
                                </li>`;
$('#cartItems').html(innerHTML)
             
            cartItemCountElement.textContent = cartItems.length;

            // Actualizar el localStorage
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }

        function clearCart() {
            cartItems = [];
            updateCart();
        }

        // Evento para limpiar el carrito al hacer clic en "Limpiar carrito"
       /* const clearCartButton = document.getElementById('clearCartButton'); // Agrega el ID al botón en tu HTML
        clearCartButton.addEventListener('click', () => {
            clearCart();
        });*/
        // Agregar producto al carrito
        function addToCart(product) {
            const existingItem = cartItems.find(item => item.id === product.id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cartItems.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image,
                    quantity: 1
                });
            }

            updateCart();
        }

        // Eliminar producto del carrito
        function removeFromCart(id) {
            cartItems = cartItems.filter(item => item.id !== id);
            updateCart();
        }

        // Evento para agregar producto al hacer clic en "Añadir al carrito"
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                const product = {
                    id: button.getAttribute('data-id'),
                    name: button.getAttribute('data-name'),
                    price: parseFloat(button.getAttribute('data-price')),
                    image: button.getAttribute('data-image'),
                };
                addToCart(product);
            });
        });

        // Evento para eliminar producto del carrito al hacer clic en el ícono de basura
        cartItemsElement.addEventListener('click', event => {
            if (event.target.classList.contains('delete-item')) {
                const itemId = event.target.getAttribute('data-id');
                removeFromCart(itemId);
            }
        });

      updateCart();
    });
</script>

@stack('scripts')
</body>

</html>
