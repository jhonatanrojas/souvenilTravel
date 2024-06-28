@extends('frontend.layout')
@section('block_main')
    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- End Map -->


    <div class="container margin_60">

        <div class="row">

            @foreach ( $productCategory as $categoria )
                
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                <div class="tour_container">
                  
                
                    <div class="img_container">
                        @if($categoria->photo)
                    
                        <a href="{{ route('/lista_paquetes',['id_destino'=> $id_destino,'id_categoria'=>$categoria->id]) }}">
                            <img src="{{ $categoria->photo->getUrl() }}" width="800" height="533" class="img-fluid" alt="image" _mstalt="60073">
                            <div class="short_info">
                                <i class="icon_set_1_icon-44"></i><font _mstmutation="1" class="price">{{$categoria->name}}</font>
                                
                            
                                
                                </span>
                            </div>
                        </a>
                        @endif
                    </div>
                    <div class="tour_title">
                        <h3>{{$categoria->description}}</h3>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small>
                        </div>
                        <!-- end rating -->
                        <div class="wishlist">
                            <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                        </div>
                        <!-- End wish list-->
                    </div>
                </div>
                <!-- End box tour -->
            </div>
            @endforeach

            <!-- End col -->


  
            <!-- End col -->

       
            <!-- End col -->


      

       
            <!-- End col -->

            <!-- End col -->

        </div>
    
@endsection
