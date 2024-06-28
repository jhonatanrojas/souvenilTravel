@extends('frontend.layout')
@section('block_main')


<!-- End section -->
<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div>
<!-- End Map -->

<div class="container margin_60">
    <div class="row">
        <div class="col-lg-8" id="single_tour_desc">
          <!--   <div id="single_tour_feat">
               <ul>
                    <li><i class="icon_set_1_icon-4"></i>Museo</li>
                    <li><i class="icon_set_1_icon-83"></i>3 Horas</li>
                    <li><i class="icon_set_1_icon-13"></i>Accesibilidad</li>
                    <li><i class="icon_set_1_icon-82"></i>144 Me gusta	
                    </li>
                    <li><i class="icon_set_1_icon-22"></i>Se admiten mascotas</li>
                    <li><i class="icon_set_1_icon-97"></i>Audioguía</li>
                    <li><i class="icon_set_1_icon-29"></i>Guía
                    </li>
                </ul>
            </div>-->

            <p class="d-block d-lg-none"><a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="Ver el mapa">Ver el mapa</a></p>
            <!-- Map button for tablets/mobiles -->

            <div id="Img_carousel" class="slider-pro">
                <div class="sp-slides">

                    @foreach ($product->photo as $key => $media) 
                     
                  
                    <div class="sp-slide">
                        <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="{{$media->getUrl()}}" data-small="{{$media->getUrl('thumb') }}" data-medium="{{$media->getUrl()}}" data-large="{{$media->getUrl()}}" data-retina="{{$media->getUrl()}}">
                    </div>
                    @endforeach
               
                </div>
                <div class="sp-thumbnails">
                    @foreach ($product->photo as $key => $media) 
                    <img alt="Image" class="sp-thumbnail" src="{{$media->getUrl('thumb') }}">
                    @endforeach
                 
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-3">
                    <h3>Descripción</h3>
                </div>
                <div class="col-lg-9">
                    <h4>{{ $product->name}}</h4>
                    <hr>
                    <h4>Que incluye</h4>
                        {!! $product->description!!}
                  
  
                 
                   
                    <!-- End row  -->
                </div>
            </div>
            <hr>
       
            <hr>
        {{--    <div class="row">
                <div class="col-lg-3">
                    <h3>Comentarios
                    </h3>
                    <a href="#" class="btn_1 add_bottom_30" data-bs-toggle="modal" data-bs-target="#myReview">Leave a review</a>
                </div>
                <div class="col-lg-9">
                    <div id="general_rating">11 Reviews
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                        </div>
                    </div>
                    <!-- End general_rating -->
                    <div class="row" id="rating_summary">
                        <div class="col-md-6">
                            <ul>
                                <li>Position
                                    <div class="rating">
                                        <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                    </div>
                                </li>
                                <li>Tourist guide
                                    <div class="rating">
                                        <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>Price
                                    <div class="rating">
                                        <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                    </div>
                                </li>
                                <li>Quality
                                    <div class="rating">
                                        <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End row -->
                    <hr>
                    <div class="review_strip_single">
                        <img src="img/avatar1.jpg" alt="Image" class="rounded-circle">
                        <small> - 10 March 2015 -</small>
                        <h4>Jhon Doe</h4>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                        </div>
                    </div>
                    <!-- End review strip -->

                    <div class="review_strip_single">
                        <img src="img/avatar3.jpg" alt="Image" class="rounded-circle">
                        <small> - 10 March 2015 -</small>
                        <h4>Jhon Doe</h4>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                        </div>
                    </div>
                    <!-- End review strip -->

                    <div class="review_strip_single last">
                        <img src="img/avatar2.jpg" alt="Image" class="rounded-circle">
                        <small> - 10 March 2015 -</small>
                        <h4>Jhon Doe</h4>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                        </p>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                        </div>
                    </div>
                    <!-- End review strip -->
                </div>
            </div> --}}
        </div>
        <!--End  single_tour_desc-->

        <aside class="col-lg-4" id="sidebar">
            <p class="d-none d-xl-block d-lg-block">
                <a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">Ver en el mapa</a>
            </p>
            <div class="theiaStickySidebar">
                <div class="box_style_1 expose" id="booking_box">
                    <h3 class="inner">- Reserva -</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group scroll-fix">
                                <label><i class="icon-calendar-7"></i> Fecha</label>
                                <input class="date-pick form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group scroll-fix-time">
                                <label><i class=" icon-clock"></i> Hora</label>
                                <input class="time-pick form-control" value="12:00 AM" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Adultos</label>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Niños</label>
                                <div class="numbers-row">
                                    <input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table_summary">
                        <tbody>
                            <tr>
                                <td>
                                    Adultos
                                </td>
                                <td class="text-end">
                                    2
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
                            <tr>
                                <td>
                                    Total 
                                </td>
                                <td class="text-end">
                                    3x $52
                                </td>
                            </tr>
                            <tr class="total">
                                <td>
                                    Importe total	
                                </td>
                                <td class="text-end">
                                    $154
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn_full" href="{{route('/listCarrito')}}">Reservar ahora</a>
                    <a class="btn_full_outline" 
                    
                    href="#"><i class=" icon-heart"></i> Añadir a favoritos</a>
                    <a class="btn_full_outline mt-2 add-to-cart" 
                    data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}"
                    href="#"><i class=" icon-cart"></i> Añadir al Carrito</a>
                </div>
                <!--/box_style_1 -->
            </div>
            <!--/sticky -->

        </aside>
    </div>
    <!--End row -->
</div>

<!--End container -->
@push('scripts')
<script src="{{ asset('template/js/jquery.sliderPro.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function ($) {
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
	<script src="{{ asset('frontend/assets/validate.js')}}"></script>

	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="{{ asset('template/js/map.js')}}"></script>
	<script src="{{ asset('template/js/infobox.js')}}"></script>

	<!-- Fixed sidebar -->
	<script src="{{ asset('template/js/theia-sticky-sidebar.js')}}"></script>
	<script>
		jQuery('#sidebar').theiaStickySidebar({
			additionalMarginTop: 80
		});
	</script>
@endpush
@endsection