<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','lowercase','max:255','regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/','unique:'.User::class],
            // --- MODIFIKASI DI SINI ---
            // Mengganti '.' dengan '.*' di semua lookahead
            'password' => ['required','confirmed','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&^#\-=+<>.,])[A-Za-z\d@$!%?&^#\-=+<>.,]{9,}$/'],
            // --- AKHIR MODIFIKASI ---
            'occupation' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ], [
            'email.regex' => 'Email must contain a valid domain and TLD (e.g., example@mail.com).',
            'password.regex' => 'Password must include uppercase, lowercase, number, and special character, and be at least 9 characters long.',
        ]);

        $photoPath = null; // Inisialisasi variabel
        if($request->hasFile('photo')){
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'occupation' => $request->occupation,
            'photo' => $photoPath,
        ]);

        $user->assignRole('student');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}