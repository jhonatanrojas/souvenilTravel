<?php
use App\Models\BloquesPagina;
use App\Models\Enlace;
use Illuminate\Support\Arr;
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



