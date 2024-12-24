<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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


    // Di method handle untuk registrasi


public function store(Request $request): RedirectResponse
{
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm-password',
    ]);

    $input = $request->all();
    $input['password'] = Hash::make($input['password']);
    $user = User::create($input);

    if (auth()->user()->hasRole('Customer')) {
        // Logika khusus untuk Customer
    }
    
    // Assign role Customer
    $user->assignRole('Customer');

    return redirect()->route('dashboard')
        ->with('success', 'User registered successfully');
}

    

}
