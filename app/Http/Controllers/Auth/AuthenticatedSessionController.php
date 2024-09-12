<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentica al usuario
        $request->authenticate();
    
        // Regenera la sesión para evitar ataques de fijación de sesión
        $request->session()->regenerate();
    
        // Obtén el usuario autenticado
        $user = auth()->user();
    
        // Verifica el rol del usuario
        if ($user->hasRole('admin')) {
            // Si el usuario es un administrador, redirige a la página principal
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            // Si el usuario no es un administrador, redirige a otra vista
            return redirect()->intended('/miscitas'); // Cambia '/otra-vista' a la ruta deseada
        }
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
