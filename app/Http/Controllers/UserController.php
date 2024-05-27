<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;

class UserController extends Controller
{
    public function misDisenios()
    {
        $user = Auth::user();
        $compras = Compra::where('user_id', $user->id)->with('disenios')->get();

        return view('mis-disenios', compact('compras'));
    }
}
