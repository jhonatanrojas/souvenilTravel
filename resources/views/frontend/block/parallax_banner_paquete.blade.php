@php
$banners =getBanner('banner_detalle_paquete');
$urlImagen=asset('template/img/hero_3.jpg');

@endphp

@foreach($banners as $key => $banner)
@if($banner->imagen)

@php
$urlImagen=$banner->imagen->getUrl();
break;
@endphp

@endif
@endforeach
<section class="parallax-window" data-parallax="scroll" data-image-src="{{$urlImagen}}" data-natural-width="1400"
    data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1>{{ $product->name }}</h1>
                    <span>{{ $product->direccion }}</span>
                    <span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                            class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                            class="icon-smile"></i><small>(75)</small></span>
                </div>
                <div class="col-md-4">
                    <div id="price_single_main">
                        por/persona <span><sup>$</sup>{{ $product->price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
