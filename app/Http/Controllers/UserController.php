<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if(auth()->attempt(['name' => $credentials['loginName'], 'password' => $credentials['loginPassword']])){
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    public function register(Request $request){
        $userField = $request->validate([
            'name' => ['required', 'string','min:3', 'max:255', RULE::unique('users', 'name')],
            'email' => ['required', 'string', 'email', 'max:255', RULE::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:255']
        ]);

        $userField['password'] = bcrypt($userField['password']);
        $user = User::create($userField);
        auth()->login($user);
        return redirect('/');
    }
}
