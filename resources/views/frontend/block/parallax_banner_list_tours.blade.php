
@php
$banners =getBanner('banner_lista_paquete');
$urlImagen=asset('template/img/hero_3.jpg');

$titulo='';
$texto='';
@endphp

@foreach($banners as $key => $banner)
@if($banner->imagen)

@php
$titulo = $banner->titulo;
$texto = $banner->html;
$urlImagen=$banner->imagen->getUrl();
break;
@endphp

@endif
@endforeach
<section class="parallax-window" data-parallax="scroll" data-image-src="{{ $urlImagen}}" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1 opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
        <div class="animated fadeInDown">
            <h1>{{$titulo}}</h1>
       {!!$texto !!}
        </div>
    </div>
</section>
<!-- End section -->
