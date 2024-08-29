<?php

namespace App\Http\Controllers;

use App\Models\City;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfilePersonUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {


        // Obtener el usuario autenticado
    $user = $request->user();
    
    // Obtener la persona asociada al usuario
    $person = $user->person;
       
        return view('profile.edit', [
            'user' => $user,
            'person' =>$person,
            
        ]);
    }

    
    

    

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Update the user's profile information.
     */
    public function updatePerson(ProfilePersonUpdateRequest $request): RedirectResponse
    {
       // Obtén el usuario autenticado
       $user = $request->user();
        
       // Actualiza los datos de la persona
       $person = $user->person; // Supongo que `person` es una relación en el modelo User
       $person->fill($request->validated());
       $person->save();


        return Redirect::route('profile.edit')->with('status', 'profilePerson-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
