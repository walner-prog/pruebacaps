<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        // Lógica para la edición del perfil
        return view('profile.edit'); // Reemplaza 'profile.edit' con la vista adecuada
    }



    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la foto de perfil
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $photoName = 'profile_' . time() . '.' . $profilePhoto->getClientOriginalExtension();
            $profilePhoto->move(public_path('images'), $photoName);
            $user->profile_photo = $photoName;
            $user->save();
        }
        

        return redirect()->route('profile', $user)->with('info', 'El perfil se actualizo con exito');
    }
}


