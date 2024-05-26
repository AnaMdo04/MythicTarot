<?php

namespace App\Http\Controllers;

use App\Models\Disenio;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index()
    {
        $disenios = Disenio::simplePaginate(9);
        return view('tienda.index', compact('disenios'));
    }

    public function show($id)
    {
        $disenio = Disenio::findOrFail($id);
        return view('tienda.show', compact('disenio'));
    }
}
