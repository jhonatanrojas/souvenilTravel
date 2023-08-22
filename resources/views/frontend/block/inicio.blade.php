

@php

$productos = getProductosByCategory(1);
$hopesajes = getProductosByCategory(2);

@endphp
<div class="container margin_60">

    <div class="main_title">
        <h2> Margarita<span> {{sc_language_render('Paquetes')}}</span> {{sc_language_render('Populares')}}</h2>
        <p>{{sc_language_render('Descubre los mejores paquetes turísticos para visitar la isla de Margarita, un destino paradisíaco con playas de arena blanca, aguas cristalinas y clima tropical.')}}</p>
    </div>

    <div class="owl-carousel owl-theme list_carousel ">

        @foreach ($productos as $producto )

    
        <div class="item">
            <div class="tour_container">
                @if($producto->destacado)
                <div class="ribbon_3 {{$producto->destacado}}"><span>{{$producto->destacado}}</span></div>
                @endif
                <div class="img_container">
                    <a href="{{route('/ver_paquete',$producto->id)}}">
                             @foreach($producto->photo as $key => $media)
                        <img src="{{ $media->getUrl() }}" width="800" height="533" class="img-fluid"
                            alt="image">
                            @break
                            @endforeach
                        <div class="short_info">
                            <i class="icon_set_1_icon-44"></i>Icono destacado<span
                                class="price"><sup>$</sup>{{$producto->price}}</span>
                        </div>
                    </a>
                </div>
                <div class="tour_title">
                    <h3><strong> {{sc_language_render('Destino')}} {{$producto->name}}</strong> </h3>
                    <div class="rating">
                        <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                            class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                            class="icon-smile"></i><small>(75)</small>
                    </div>
                    <!-- end rating -->
                    <div class="wishlist">
                        <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                class="tooltip-content-flip"><span class="tooltip-back">Agregar a favorito</span></span></a>
                    </div>
                    <!-- End wish list-->
                </div>
            </div>
            <!-- End box tour -->
        </div>
        @endforeach

   
    </div>
    <!-- /carousel -->

    <p class="text-center ">
        <a href="{{route('/lista_paquetes')}}" class="btn_1">{{sc_language_render('Ver todos los paquetes')}}</a>
    </p>

    <hr class="mt-1 mb-5">

    <div class="main_title">
        <h2>Margarita <span>Hospedajes </span> Destacados</h2>
        <p>¿Estás buscando un lugar donde alojarte en Margarita? ¡Tenemos lo que necesitas! En nuestra página web encontrarás una selección de los mejores hospedajes de la isla, desde hoteles de lujo hasta posad</p>
    </div>

    <div class="owl-carousel owl-theme list_carousel ">
        @foreach ($hopesajes as $hospedaje )
            
      
        <div class="item">
            <div class="hotel_container">
                @if($hospedaje->destacado)
                <div class="ribbon_3 {{$hospedaje->destacado}}"><span>{{$hospedaje->destacado}}</span></div>
                @endif
                <div class="img_container">
                    <a href="single_hotel.html">
                        <a href="single_tour.html">
                            @foreach($hospedaje->photo as $key => $media)
                       <img src="{{ $media->getUrl() }}" width="800" height="533" class="img-fluid"
                           alt="image">
                           @break
                           @endforeach
                    
                        <div class="short_info hotel">
                            <span class="price"><sup>$</sup>{{$hospedaje->price}}</span>
                        </div>
                    </a>
                </div>
                <div class="hotel_title">
                    <h3><strong> {{$hospedaje->name}}</strong> </h3>
                    <div class="rating">
                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star voted"></i><i class="icon-star voted"></i><i
                            class="icon-star-empty"></i>
                    </div>
                    <!-- end rating -->
                    <div class="wishlist">
                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span
                                class="tooltip-content-flip"><span class="tooltip-back">
                                    {{sc_language_render('Agregar a Favoritos')}}</span></span></a>
                    </div>
                    <!-- End wish list-->
                </div>
            </div>
            <!-- End box -->
        </div>
        @endforeach
   
    </div>
    <!-- /carousel -->

    <p class="text-center nopadding pt-0">
        <a href="{{route('/lista_paquetes')}}" class="btn_1">{{sc_language_render('Ver todos')}}</a>
    </p>

</div>
<!-- End container -->

<div class="white_bg">
    <div class="container margin_60">
        <div class="main_title">
            <h2>Planifica tus <span>Vacaciones</span> facilmente</h2>
            <p>
                Descubre los mejores paquetes turísticos y hospedajes que tenemos para ti. Podrás elegir entre una gran variedad de destinos, actividades y alojamientos, con precios accesibles y facilidades de pago            </p>
        </div>
        <div class="row feature_home_2">
            <div class="col-md-4 text-center">
                <img src="{{asset('template/img/adventure_icon_1.svg')}}" alt="" width="75" height="75">
                <h3>Itinerarios estudiados en detalle
                    </h3>
                <p>e ofrecemos paquetes turísticos y hospedajes de calidad, con opciones para todos los gustos y presupuestos. </p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('template/img/adventure_icon_2.svg')}}" alt="" width="75" height="75">
                <h3>Habitaciones y comida incluidas
                </h3>
                <p> abitaciones y comida incluidas en los mejores hoteles y resorts de la zona</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{asset('template/img/adventure_icon_3.svg')}}" alt="" width="75" height="75">
                <h3>Todo organizado
                </h3>
                <p>Te ofrecemos los mejores paquetes turísticos y hospedajes para que solo te dediques a disfrutar. Elige tu destino, tu fecha y tu presupuesto, y nosotros nos encargamos del resto.</p>
            </div>
        </div>

    
        <!-- /banner_2 -->

    </div>
    <!-- End container -->
</div>
<!-- End white_bg -->

<div class="container margin_60">
    <div class="main_title">
        <h2> <span>Blog</span> Novedades</h2>
        <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <a class="box_news" href="blog.html">
                <figure><img src="{{asset('template/img/news_home_1.jpg')}}" alt="">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>Mark Twain</li>
                    <li>20.11.2017</li>
                </ul>
                <h4>Pri oportere scribentur eu</h4>
                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                    ullum vidisse....</p>
            </a>
        </div>
        <!-- /box_news -->
        <div class="col-lg-6">
            <a class="box_news" href="blog.html">
                <figure><img src="{{asset('template/img/news_home_2.jpg')}}" alt="">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>Jhon Doe</li>
                    <li>20.11.2017</li>
                </ul>
                <h4>Duo eius postea suscipit ad</h4>
                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                    ullum vidisse....</p>
            </a>
        </div>
        <!-- /box_news -->
        <div class="col-lg-6">
            <a class="box_news" href="blog.html">
                <figure><img src="{{asset('template/img/news_home_3.jpg')}}" alt="">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>Luca Robinson</li>
                    <li>20.11.2017</li>
                </ul>
                <h4>Elitr mandamus cu has</h4>
                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                    ullum vidisse....</p>
            </a>
        </div>
        <!-- /box_news -->
        <div class="col-lg-6">
            <a class="box_news" href="blog.html">
                <figure><img src="{{asset('template/img/news_home_4.jpg')}}" alt="">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>Paula Rodrigez</li>
                    <li>20.11.2017</li>
                </ul>
                <h4>Id est adhuc ignota delenit</h4>
                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse
                    ullum vidisse....</p>
            </a>
        </div>
        <!-- /box_news -->
    </div>
    <!-- /row -->
    <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p>
</div>
<!-- End container -->