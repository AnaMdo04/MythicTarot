<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function misDisenios()
    {
        $compras = Compra::where('user_id', Auth::id())->with('disenios')->simplePaginate(5);

        return view('mis-disenios', compact('compras'));
    }
}
