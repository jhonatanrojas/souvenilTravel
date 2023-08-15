<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-6"><i class="icon-phone"></i><strong>0045 043204434</strong></div>
                <div class="col-6">
                    <ul id="top_links">
                        <li><a href="#sign-in-dialog" id="access_link">{{  sc_language_render('Iniciar Sesión')}}</a></li>
                        <li><a href="wishlist.html" id="wishlist_link">{{  sc_language_render('Lista de deseos')}}</a></li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->
    
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div id="logo_home">
                    <h1><a href="{{ request()->url() }}" title="City tours travel template">City Tours travel template</a></h1>
                </div>
            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="{{ asset('souvenir.png')}}" width="160" height="34" alt="Souvenir logo">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                     <ul>
                        @php 
                    $sc_layoutsUrl =getEnlaces();
                        @endphp
                        @if (!empty($sc_layoutsUrl))
                        
                        @foreach ($sc_layoutsUrl   as $key =>  $url)
                   
                        <li class="menu-main"><a href="{{ sc_url_render($url->url) }}"
                            {{ ($url->target =='_blank')?'target=_blank':''  }}
                            >
                            
                            <i class=" {{ $url->icono }} m-1  "></i>{{  sc_language_render($url->nombre) }} </a> </li>
                     
                       
                        @endforeach
                        @endif
    
                      

                    </ul>
                </div><!-- End main-menu -->
                <ul id="top_tools">
                    <li>
                        <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a>
                    </li>
                    <li>

                        <div class="dropdown dropdown-cart">
                            <a href="#" data-bs-toggle="dropdown" class="cart_bt"><i class="icon_bag_alt"></i><strong id="cartItemCount">0</strong></a>
                            <ul class="dropdown-menu" id="cartItems">
                              
                              
                                <li>
                                    <div>Total: <span id="cartTotal">$0.00</span></div>
                                    <a href="cart.html" class="button_drop">Ir al carrito</a>
                                    <a href="payment.html" class="button_drop outline">Reservar</a>
                                </li>
                            </ul>
                        </div>
               

                        
              
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- container -->
</header>