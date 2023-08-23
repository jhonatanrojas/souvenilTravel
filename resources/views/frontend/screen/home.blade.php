@extends('frontend.layout')

{{--  block_main_content_center  --}}
@section('block_main_content_center')
@push('css')
<link href="{{ asset('layerslider/css/layerslider.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('layerslider/js/greensock.js') }}"></script>
<script src="{{ asset('layerslider/js/layerslider.transitions.js') }}"></script>
<script src="{{ asset('layerslider/js/layerslider.kreaturamedia.jquery.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        'use strict';
        $('#layerslider').layerSlider({
            autoStart: true,
            responsive: true,
            responsiveUnder: 1280,
            layersContainer: 1170,
            skinsPath: 'layerslider/skins/'
                // Please make sure that you didn't forget to add a comma to the line endings
                // except the last line!
        });
    });
</script>

@endpush
@endsection