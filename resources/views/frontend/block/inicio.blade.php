@php
    use App\Models\Destino;
    $productos = getProductosByCategory(1);
    $hopesajes = getProductosByCategory(2);
    
    //dd( getEstadoDestino());
    $estados = getEstados();

  


@endphp

<div class="container margin_60">

@foreach ($estados  as $estado)
    

    <div class="main_title">
        <h2> <span>{{$estado->nombre}}</span> </h2>

        <p>{{$estado->descripcion}}</p>
    </div>
  
    <div class="row">

        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

            @foreach (getEstadoDestino($estado->id) as $destino )
                
            @php

             $urlImagen ='';
        
             foreach($destino->fhotos as $key => $media){
                         
          
                $urlImagen =    $media->getUrl() ;
                break;
            
              
            }
                
            @endphp
      
            <div class="item">
                <div class="tour_container">
         
                    <div class="img_container">
                        @php
                  
                        @endphp
                        <a href='/listaCategorias/{{$destino->id}}'>
                            <img src="{{$urlImagen}}" width="800" height="533" class="img-fluid" alt="image">
                            <div class="short_info">
                                <i class="icon_set_1_icon-44"></i>{{$destino->nombre_eje}}
                            </div>
                        </a>
                        
                    </div>
                    
                    <div class="tour_title">
                        <h3 class="text-center"><strong>                  {{ $destino->nombre ?? '' }}</strong> </h3>
                  
                        <!-- end rating -->
                 
                        <!-- End wish list-->
                    </div>
                </div>
                <!-- End box tour -->
            </div>
            @endforeach
            <!-- /item -->
     
            <!-- /item -->

            <!-- /item -->
  
            <!-- /item -->
   
            <!-- /item -->
        </div>
        <!-- /carousel -->
 
    </div>

    @endforeach

 





</div>
