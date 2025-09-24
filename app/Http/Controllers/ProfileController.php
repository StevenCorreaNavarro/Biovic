<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{

    public function ver(Request $request)
    {
        $hdvs = user::all();
        // $hdvs = hojadevida::with('equipo')->get();


        return view('profile.user', compact('hdvs'))->with('success', '¡Registro creado exitosamente!');
    }
    // $hdvs = Hojadevida::orderBy('id', 'desc')->get();
    // 


    public function verperfiles($user,Request $request)
    {
        $hdvs = User::findOrFail($user);
        // $hdvs = hojadevida::with('equipo')->get();
        return view('profile.users', compact('hdvs'))->with('success', '¡Registro creado exitosamente!');
        // $hdvs = Hojadevida::orderBy('id', 'desc')->get();
        // return view('hojadevida.listar', compact('hdvs'));
        // return view('hojadevida.listar', compact('hdvs'));
    }




    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $hdv = new User();
        $request->validate([

            'foto' => 'nullable|max:10000|mimes:jpeg,png,jpg,gif,svg',

        ]);
        if ($request->hasFile('foto')) {
            $hdv->foto = $request->file('foto')->store('public/fotos');
            $hdv->foto = str_replace('public/', '', $hdv->foto); // Eliminar 'public/' para la BD
        }
        return view('profile.edit', ['user' => $request->user(), 'hdv' => $hdv]);
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
