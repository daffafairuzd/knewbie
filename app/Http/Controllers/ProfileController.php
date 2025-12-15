<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]); 
    }

    /**
     * Show subscription history for the logged-in user.
     */
    public function subscriptions(Request $request): View
    {
        $user = $request->user();

        // ambil semua transaksi user + relasi pricing (sesuaikan dengan project-mu)
        $transactions = $user->transactions()
            ->with('pricing') // ganti kalau nama relasi paketmu beda
            ->orderByDesc('created_at')
            ->get();

        return view('profile.subscriptions', [
            'user'         => $user,
            'transactions' => $transactions,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Data yang sudah divalidasi (bisa hanya name / email / occupation / photo)
        $data = $request->validated();

        // HANDLE FOTO (kalau form mengirim field "photo")
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            // Simpan ke storage/app/public/photos
            $path = $file->store('photos', 'public');

            // Simpan path ke kolom "photo"
            $data['photo'] = $path;
        }

        // Kalau email diubah, reset verifikasi email
        if (array_key_exists('email', $data) && $data['email'] !== $user->email) {
            $user->email_verified_at = null;
        }

        // Partial update: hanya field yang ada di $data yang akan di-update
        $user->fill($data);
        $user->save();

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
