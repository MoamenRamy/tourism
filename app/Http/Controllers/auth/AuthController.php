<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Laravel\Jetstream\Jetstream;

class AuthController extends Controller
{
    public function create()
    {
        $currencies = Currency::all();
        $nationalities = Nationality::all();

        return view('auth.register', compact('currencies', 'nationalities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()], // Jetstream default rules
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'currency_id' => 'required|exists:currencies,id',
            'nationality_id' => 'required|exists:nationalities,id',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'currency_id' => $request->currency_id,
            'nationality_id' => $request->nationality_id,
        ]);

        Auth::login($user);

        return redirect()->route('home'); // or wherever you want
    }
}
