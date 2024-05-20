<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        // Exclude some routes from guest middleware
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'tienda', 'aboutUs', 'tarot', 'faqs', 'terms', 'cookies', 'contact'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You have successfully registered and logged in!');
        }

        return redirect('register')->withErrors('Unable to log in with provided credentials.');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle the user login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    } 

    /**
     * Display the user dashboard after login.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }
        
        return redirect('login')->withErrors('Please log in to access the dashboard.');
    } 

    /**
     * Log out the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('success', 'You have logged out successfully.');
    }

    // Additional pages methods ...
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
