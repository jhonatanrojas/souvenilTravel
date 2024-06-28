@extends('frontend.layout')
@section('block_main')
    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- End Map -->


    <div class="container margin_60">

        <div class="row">
            <aside class="col-lg-3">
                <p>
                    <a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false"
                        aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">Ver el
                        mapa</a>
                </p>

                <div class="box_style_cat">
                    <ul id="cat_nav">
                        @foreach ($productCategory as  $categoria)
                            
        
                        <li><a href="{{ route('/lista_paquetes',['id_destino'=> $id_destino,'id_categoria'=>$categoria->id]) }}" id="active"><i class="icon_set_1_icon-51"></i>{{$categoria->name}}
                                </a>
                        </li>
                        @endforeach

                    </ul>
                </div>

                <div id="filters_col">
                    <a data-bs-toggle="collapse" href="#collapseFilters" aria-expanded="false"
                        aria-controls="collapseFilters" id="filters_col_bt"><i class="icon_set_1_icon-65"></i>Filtros</a>
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Precio</h6>
                            <input type="text" id="range" name="range" value="">
                        </div>
                        <div class="filter_type">
                            <h6>Clasificación</h6>
                            <ul>
                                <li>
                                    <label class="container_check">
                                        <span class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile voted"></i>
                                        </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        <span class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile"></i>
                                        </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        <span class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile voted"></i><i class="icon-smile"></i><i
                                                class="icon-smile"></i>
                                        </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        <span class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                        </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        <span class="rating">
                                            <i class="icon-smile voted"></i><i class="icon-smile"></i><i
                                                class="icon-smile"></i><i class="icon-smile"></i><i class="icon-smile"></i>
                                        </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!--End collapse -->
                </div>
                <!--End filters col-->
                <div class="box_style_2 d-none d-sm-block">
                    <i class="icon_set_1_icon-57"></i>
                    <h4>¿Necesita <span>ayuda?</span></h4>
                    <a href="tel://004542344599" class="phone">+58 423 445 99</a>
                    <small>Lunes a Viernes 9.00am - 7.30pm
                    </small>
                </div>
            </aside>
            <!--End aside -->
            <div class="col-lg-9">

                <div id="tools">
                    <div class="row justify-content-between">
                        <div class="col-md-3 col-sm-4">
                            <div class="styled-select-filters">
                                <select name="sort_price" id="sort_price">
                                    <option value="" selected>Ordenar por Precio</option>
                                    <option value="lower">Precio mas Bajo</option>
                                    <option value="higher">Precio mas alto</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 d-none d-sm-block text-end">
                            <a href="all_tours_grid.html" class="bt_filters"><i class="icon-th"></i></a> <a
                                href="#" class="bt_filters"><i class=" icon-list"></i></a>
                        </div>

                    </div>
                </div>
                <!--/tools -->

                @php
                    $segund = 1;
                @endphp
                @foreach ($products as $product)
                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.{{ $segund }}s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 position-relative">
                                @if ($product->destacado)
                                    <div class="ribbon_3 {{ $product->destacado }}"><span>{{ $product->destacado }}</span>
                                    </div>
                                @endif

                                <div class="wishlist">
                                    <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span
                                            class="tooltip-content-flip"><span class="tooltip-back">Agregar a
                                                favoritos</span></span></a>


                                </div>




                                <div class="img_list">
                                    @php
                                        $urlImagen = '';
                                    @endphp
                                    <a href="{{ route('/ver_paquete', $product->id) }}">
                                        @foreach ($product->photo as $key => $media)
                                            <img src="{{ $media->getUrl() }}" width="800" height="533"
                                                class="" alt="image">
                                            @php
                                                $urlImagen = $media->getUrl('thumb');
                                            @endphp
                                        @break
                                    @endforeach
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="tour_list_desc">
                                <div class="rating"><i class="icon-smile voted"></i><i
                                        class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i
                                        class="icon-smile  voted"></i><i class="icon-smile"></i><small>(75)</small>
                                </div>
                                <h3><strong>
                                        {{ $product->name }}
                                    </strong> </h3>
                                {!! substr($product->resumen, 0, 150) !!} ...

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <div class="price_list">
                                <div><sup>$</sup>{{ $product->price }}*
                                    {{-- <span class="normal_price_list">$99</span>
                                        id: button.getAttribute('data-id'),
                name: button.getAttribute('data-name'),
                price: parseFloat(button.getAttribute('data-price')),
                image: button.getAttribute('data-image'),
                                    
                                    --}}
                                    <small>*
                                    </small>
                                    <p>
                                        <a data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}" data-image="{{ $urlImagen }}"
                                            class="btn_full_outline p-2 mb-1 add-to-cart" style="font-size:10px"
                                            href="javascript:void(0);"><i class=" icon-cart"></i> Añadir al
                                            Carrito</a>
                                    </p>
                                    <p><a href="{{ route('/ver_paquete', $product->id) }}" class="btn_full">Ver
                                            detalle</a>
                                    </p>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--End strip -->
                @php
                    $segund++;
                @endphp
            @endforeach
            <!--End strip -->


            <!--End strip -->


            <!--End strip -->


            <!--End strip -->


            <p class="text-center ">
                <a href="{{ route('/listCarrito') }}" class="btn_1">{{ sc_language_render('Ir al carrito') }}</a>
            </p>
            <!-- Coloca esta sección en la ubicación deseada dentro de tu vista -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">anterior</span>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">anterior</span>
                            </a>
                        </li>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    @if ($products->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Siguiente</span>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>


            <!-- end pagination-->

        </div>
        <!-- End col lg-9 -->
    </div>
    <!-- End row -->
</div>
@endsection
