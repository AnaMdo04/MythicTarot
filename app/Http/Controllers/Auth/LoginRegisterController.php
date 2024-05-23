<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Comentario; // Make sure you have this model
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'tienda', 'aboutUs', 'tarot', 'faqs', 'terms', 'cookies', 'contact', 'index'
        ]);
    }
    public function index()
    {
        $smallBlocks = Comentario::with('user')->inRandomOrder()->take(3)->get();  // Use 'user' instead of 'usuario'
    
        return view('welcome', compact('smallBlocks'));
    }

public function allComments(Request $request)
{
    $query = Comentario::with(['user', 'lectura']);

    if ($request->has('filter') && $filter = $request->get('filter')) {
        $query->whereHas('lectura', function ($q) use ($filter) {
            $q->where('cards', 'like', '%' . $filter . '%');
        });
    }

    $comments = $query->paginate(10);
    return view('comentarios', compact('comments'));
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
            return redirect()->intended('dashboard')->with('success', 'Logged in successfully');
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

    // Additional page methods
    public function tienda() {
        return view('tienda');
    }

    public function aboutUs() {
        return view('aboutUs');
    }

    public function faqs() {
        return view('faqs');
    }

    public function terms() {
        return view('terms');
    }

    public function cookies() {
        return view('cookies');
    }

    public function contact() {
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
