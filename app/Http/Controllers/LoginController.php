<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Contracts\Service\Attribute\Required;

class LoginController extends Controller{



public function login(Request $request) {

    $credentials= $request->validate([
        'email'=>['required', 'email'],
        'password'=>['required'],
    ]);


    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect(route('private'));
    }

    return back()->with('error', 'Login failed');

}   


public function register(Request $request){
    $request->validate([
        'name'=> ['required'],
        'email' => ['required','unique:users,email','email:dns,rfc,strict'],
        'password'=> ['required','confirmed', Password::min(8)->letters()->numbers()],
        'telephone'=> ['required'],
        'street_type'=> ['sometimes','nullable'],
        'street_name'=> ['sometimes','nullable'],
        'number'=> ['sometimes','nullable'],
        'postcode'=> ['sometimes','nullable'],
        'city'=> ['sometimes','nullable'],
        'country'=> ['sometimes','nullable'],
        'username'=> ['required', 'unique:users,username'],
        'surname' =>['required']],
        ['password.required'=> 'La contraseña es obligatoria',
        'password.*'=> 'La contraseña debe tener 8 caracteres, una letra y un número',
    ]);

    $user= new User();
    $user->name= $request->name;
    $user->email= $request->email;
    $user->password= $request->password;
    $user->telephone= $request->telephone;
    $user->street_type=$request->street_type;
    $user->street_name=$request->street_name;
    $user->number=$request->number;
    $user->postcode= $request->postcode;
    $user->city=$request->city;
    $user->country= $request->country;
    $user->username= $request->username;
    $user->surname= $request->surname;

    if ($user->save()){
        Auth::login($user);
        return redirect((route('private')));
    }else{
        return redirect ((route('register')));
    }
}


public function logout(Request $request){
    
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect(route('login-index'));
}

public function showProfile (){
    $user= Auth::user();

    return view('profile', compact('user'));
}

}