<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->only('nombre', 'apellido', 'email', 'mensaje');

        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('contactmythictarot@gmail.com', 'MythicTarot Contact')->subject('Nuevo Mensaje de Contacto');
            $message->from($data['email'], $data['nombre'] . ' ' . $data['apellido']);
        });

        return back()->with('success', '¡Gracias por contactarnos!');
    }
}
