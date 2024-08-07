<?php
use App\Models\BloquesPagina;
use App\Models\Enlace;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Destino;
use App\Models\Estado;

use Illuminate\Support\Arr;

use function Laravel\Prompts\select;

function listBloques()
{
    return BloquesPagina::where('estatus', 1)
    ->orderBy('orden', 'asc')
    ->get()
    ->groupBy('posicion');
}
function getEnlaces($grupo='menu')
{
    return Enlace::where('grupo', $grupo)
    ->orderBy('orden', 'asc')
    ->get();
}
function getProductosByCategory($id_categoria=0)
{
 return Product::with(['prestador_servicios', 'estado', 'destino', 'tags', 'category', 'media'])
 
 ->where('category_id',$id_categoria)
 ->where('estatus',1)
 ->get();
}

function getBanner($ubicacion='principal')
{
    return Banner::with(['media'])->where('ubicacion', $ubicacion)
    ->orderBy('orden', 'asc')
    ->get();
}


function getEstadoDestino($codigo)
{
return Destino::with(['media','codigo_estado'])  
->where('codigo_estado_id',$codigo)  
  ->get();

}

function getEstados()
{

    return Estado::join('destinos', 'estados.id', '=', 'destinos.codigo_estado_id')
  ->select('estados.nombre','estados.id','estados.descripcion')
  ->orderBy('orden')
  ->groupBy('estados.nombre','estados.id','estados.descripcion')
    ->get();
  
}



function sc_url_render(string $string = null):string
{
    $arrCheckRoute = explode('route::', $string);


    if (count($arrCheckRoute) == 2) {
        $arrRoute = explode('::', $string);
     
            if (isset($arrRoute[2])) {
                return sc_route($arrRoute[1], explode(',', $arrRoute[2]));
            } else {
                return sc_route($arrRoute[1]);
            }
        
    }

 
    return url($string);
} 
function sc_language_render($clave){

    return $clave;
}

function sc_route($name, $param = [])
{
  
        $arrRouteExcludeLanguage = ['home','locale', 'currency', 'banner.click'];
        if (!key_exists('lang', $param) && !in_array($name, $arrRouteExcludeLanguage)) {
            $param['lang'] = app()->getLocale();
        }
    
    
    if (Route::has($name)) {
        try {
            $route = route($name, $param);
        } catch (\Throwable $th) {
            $route = url('#'.$name.'#'.implode(',', $param));
        }
        return $route;
    } else {
        return url('#'.$name);
    }
}



