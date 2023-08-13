<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public $templatePath;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->templatePath = 'frontend';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {



        $viewHome = $this->templatePath . '.screen.home';
        $layoutPage = 'home';

        return view(
            $viewHome,
            array(
                'title'       => 'Inicio',
                'keyword'     => 'palablas clave',
                'description' => 'descripcion',

                'layout_page' => $layoutPage,
            )
        );
    }
}
