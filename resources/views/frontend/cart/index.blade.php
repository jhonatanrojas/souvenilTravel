@extends('frontend.layout')
@section('block_main')
    <section id="hero_2" class="background-image" data-background="url({{ asset('img/slide_hero_2.jpg') }})">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="intro_title">
                <h1>COMPLETA TU PEDIDO</h1>
                <div class="bs-wizard row">

                    <div class="col-4 bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Tu carrito</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="{{route('/listCarrito')}}" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col-4 bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Sus datos </div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="{{route('/datosCarrito')}}" class="bs-wizard-dot"></a>
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
    <!-- End Section hero_2 -->

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                    </li>
                    <li><a href="#">Category</a>
                    </li>
                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- End position -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table table-striped cart-list add_bottom_30" id="tabla-carrito">
                        <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Descuento
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody id="datos-carrito">



                        </tbody>
                    </table>
                    <table class="table table-striped options_cart">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    AGREGAR OPCIONES / SERVICIOS

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:10%">
                                    <i class="icon_set_1_icon-16"></i>
                                </td>
                                <td style="width:60%">
                                    Guía turístico dedicado <strong>+$34</strong>
                                </td>
                                <td style="width:35%">
                                    <label class="switch-light switch-ios float-end">
                                        <input type="checkbox" name="option_1" id="option_1" checked value="">
                                        <span>
                                            <span>No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon_set_1_icon-26"></i>
                                </td>
                                <td>
                                    Servicio de recogida <strong>+$34*</strong>
                                </td>
                                <td>
                                    <label class="switch-light switch-ios float-end">
                                        <input type="checkbox" name="option_2" id="option_2" value="">
                                        <span>
                                            <span>No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon_set_1_icon-71"></i>
                                </td>
                                <td>
                                    Seguro <strong>+$24*</strong>
                                </td>
                                <td>
                                    <label class="switch-light switch-ios float-end">
                                        <input type="checkbox" name="option_3" id="option_3" value="" checked>
                                        <span>
                                            <span>No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon_set_1_icon-15"></i>
                                </td>
                                <td>
                                    Botella de bienvenida<strong>+$24</strong>
                                </td>
                                <td>
                                    <label class="switch-light switch-ios float-end">
                                        <input type="checkbox" name="option_4" id="option_4" value="">
                                        <span>
                                            <span>No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon_set_1_icon-59"></i>
                                </td>
                                <td>
                                    Desayuno <strong>+$12*</strong>
                                </td>
                                <td>
                                    <label class="switch-light switch-ios float-end">
                                        <input type="checkbox" name="option_5" id="option_5" value="">
                                        <span>
                                            <span>No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon_set_1_icon-58"></i>
                                </td>
                                <td>
                                    Cena <strong>+$26*</strong>
                                </td>
                                <td>
                                    <label class="switch-light switch-ios float-end">
                                        <input type="checkbox" name="option_6" id="option_6" value="">
                                        <span>
                                            <span>No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="icon_set_1_icon-40"></i>
                                </td>
                                <td>
                                    Alquiler de bicicletas <strong>+$26*</strong>
                                </td>
                                <td>
                                    <label class="switch-light switch-ios float-end">
                                        <input type="checkbox" name="option_7" id="option_7" value="">
                                        <span>
                                            <span>No</span>
                                            <span>Yes</span>
                                        </span>
                                        <a></a>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="add_bottom_15"><small>* Prices for person.</small>
                    </div>
                </div>
                <!-- End col -->

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
                                <tr>
                                    <td>
                                        Niños
                                    </td>
                                    <td class="text-end">
                                        0
                                    </td>
                                </tr>
                                {{--      <tr>
                                    <td>
                                        Guía turístico dedicado
                                    </td>
                                    <td class="text-end">
                                        $34
                                    </td>
                                </tr>
                               <tr>
                                    <td>
                                        Seguro
                                    </td>
                                    <td class="text-end">
                                        $34
                                    </td>
                                </tr>--}}
                                <tr class="total">
                                    <td>
                                        Total 
                                    </td>
                                    <td class="text-end total_productos">
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn_full" href="{{route('/datosCarrito')}}">Continuar</a>
                        <a class="btn_full_outline" href="/"><i class="icon-right"></i> Regresar</a>
                    </div>
                    <div class="box_style_4">
                        <i class="icon_set_1_icon-57"></i>
                        <h4>Necesitas <span>ayuda?</span></h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>Lunes a Viernes 9.00am - 7.30pm</small>
                    </div>
                </aside>
                <!-- End aside -->

            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </main>

    <!--End container -->
    @push('scripts')
        <script src="{{ asset('template/js/jquery.sliderPro.min.js') }}"></script>
        <script type="text/javascript">
             

            $(document).ready(function($) {

                document.addEventListener('DOMContentLoaded', () => {
                    let cartItemsElement = document.getElementById('cartItems');
                    cartItemsElement.addEventListener('click', event => {
                        console.log('Evento click')
                        if (event.target.classList.contains('delete-item')) {
                            const itemId = event.target.getAttribute('data-id');
                   
                        }
                    });
                })

                cargarCarrito();



                function cargarCarrito() {
                    // Obtener productos del localStorage o inicializar un array vacío
                    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                    let total = 0; 
                    let innerHTML = '';
                    cartItems.forEach(item => {
                        total += item.price * item.quantity;
                        innerHTML += ` 
                                    
                                    <tr id="item_cart${item.id}" class="item_carts">
                                <td>

                                    <span class="item_cart">${item.name}</span>
                                </td>
                                <td>
                                    <div class="numbers-row">
                                        <input type="text" value="${item.quantity}" id="quantity_${item.id}" class="qty2 form-control"
                                            name="quantity_${item.id}">
                                    </div>
                                </td>
                                <td>
                                    0%
                                </td>
                                <td>
                                    <strong>$${item.price.toFixed(2)}</strong>
                                </td>
                                <td class="options">
                                    <a href="#" class="delete-item" onclick="eliminarItemCart(${item.id})"><i class=" icon-trash delete-item"  data-id="${item.id}" ></i></a>
                           
                                </td>
                            </tr>`;

                        $('#datos-carrito').html(innerHTML)
                    })

                    $('.total_productos').html(total)


                }

        
                $('#Img_carousel').sliderPro({
                    width: 960,
                    height: 500,
                    fade: true,
                    arrows: true,
                    buttons: false,
                    fullScreen: false,
                    smallSize: 500,
                    startSlide: 0,
                    mediumSize: 1000,
                    largeSize: 3000,
                    thumbnailArrows: true,
                    autoplay: false
                });
            });
        </script>

        <!--Review modal validation -->
        <script src="{{ asset('frontend/assets/validate.js') }}"></script>

        <!-- Map -->
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="{{ asset('template/js/map.js') }}"></script>
        <script src="{{ asset('template/js/infobox.js') }}"></script>

        <!-- Fixed sidebar -->
        <script src="{{ asset('template/js/theia-sticky-sidebar.js') }}"></script>
        <script>
            jQuery('#sidebar').theiaStickySidebar({
                additionalMarginTop: 80
            });
        </script>
    @endpush
@endsection
