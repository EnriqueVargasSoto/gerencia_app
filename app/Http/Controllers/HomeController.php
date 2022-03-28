<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Objetivos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = auth()->user();

        if ($usuario->rol == 'admin') {

            $usuarios = User::where('rol','usuario')->where('estado','activo')->get();
            $empresas = Empresa::where('estado','activo')->get();
            return view('admin.pages.usuarios.index')->with(compact('usuarios', 'empresas'));

        } else {
            $objetivos = Objetivos::where('estado','activo')->get();
            return view('admin.pages.objetivos.index')->with(compact('objetivos'));
        }
        
        
    }
}
