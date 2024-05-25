<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\Carta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'tienda', 'aboutUs', 'tarot', 'faqs', 'terms', 'cookies', 'contact', 'allComments', 'index'
        ]);
    }
    public function index()
    {
        $smallBlocks = Comentario::with('user')->inRandomOrder()->take(3)->get();

        return view('welcome', compact('smallBlocks'));
    }


    public function allComments(Request $request)
    {
        $comments = Comentario::with(['user', 'lectura'])->paginate(10);
        $cartas = Carta::all();
        return view('comentarios', compact('comments', 'cartas'));
    }


    public function comentarios(Request $request)
    {
        $query = Comentario::with(['user', 'lectura']);

        if ($request->has('filter')) {
            $query->whereHas('lectura', function ($q) use ($request) {
                $q->where('cards', 'like', '%' . $request->filter . '%');
            });
        }

        $comments = $query->paginate(10);
        return view('comentarios.filtered', compact('comments'));
    }



    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);
        return redirect()->route('welcome')->with('success', 'Registered and logged in successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function dashboard()
    {
        return view('auth.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out!');
    }

    public function tienda()
    {
        return view('tienda');
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }

    public function faqs()
    {
        $faqs = [
            ['question' => '¿Qué es MythicTarot?', 'answer' => 'MythicTarot es una plataforma en línea que permite a los usuarios recibir lecturas de tarot personalizadas y comprar diseños exclusivos de cartas de tarot. A través de animaciones interactivas, los usuarios pueden explorar respuestas a sus preguntas y conectar con los arquetipos míticos del tarot.'],
            ['question' => '¿Cómo puedo obtener una lectura de tarot en MythicTarot?', 'answer' => 'Para obtener una lectura de tarot, primero debe registrarse y crear un perfil. Luego, simplemente navegue a la sección de "Lectura de Tarot", formule su pregunta y siga las instrucciones para recibir su lectura personalizada con animaciones interactivas.'],
            ['question' => '¿Son las lecturas de tarot en MythicTarot realizadas por tarotistas reales?', 'answer' => 'Las lecturas de tarot en MythicTarot se generan mediante un algoritmo basado en la selección aleatoria de cartas y sus interpretaciones asociadas. Aunque no son realizadas por tarotistas reales, cada lectura se basa en interpretaciones tradicionales de las cartas de tarot.'],
            ['question' => '¿Qué tipo de información puedo esperar en las interpretaciones de las lecturas de tarot?', 'answer' => 'Las interpretaciones de nuestras lecturas de tarot proporcionan una descripción detallada de cada carta seleccionada y su relevancia en la posición que ocupa en la lectura. Se ofrecen insights sobre cómo las energías y símbolos de las cartas pueden aplicarse a su situación personal o pregunta formulada, ayudándole a reflexionar y tomar decisiones informadas sobre aspectos específicos de su vida.'],
            ['question' => '¿Puedo guardar una lectura para verla más tarde?', 'answer' => 'Sí, cada lectura se puede guardar en su perfil bajo el historial de lecturas, donde puede ver, editar o eliminar las lecturas guardadas en cualquier momento.'],
            ['question' => '¿Qué métodos de pago se aceptan en la tienda?', 'answer' => 'Aceptamos varios métodos de pago incluyendo tarjetas de crédito, PayPal y otros pagos electrónicos a través de pasarelas de pago seguras.'],
            ['question' => '¿Cómo puedo asegurarme de que mi información personal está protegida?', 'answer' => 'La seguridad de su información es nuestra prioridad. Utilizamos encriptación avanzada y medidas de seguridad robustas para proteger sus datos personales y las transacciones de pago.'],
            ['question' => '¿Qué hago si tengo problemas técnicos con la plataforma?', 'answer' => 'Si experimenta cualquier problema técnico, por favor visite nuestra página de Contacto para enviarnos un mensaje directamente.'],
        ];

        return view('faqs', compact('faqs'));
    }


    public function terms()
    {
        return view('terms');
    }

    public function cookies()
    {
        return view('cookies');
    }

    public function contact()
    {
        return view('contact');
    }

    public function tarot()
    {
        if (Auth::check()) {
            return view('tarot');
        } else {
            return redirect('login')->with('error', 'You need to log in to access this page.');
        }
    }
}
