<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
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
    $validatedData= $request->validate($this->validateDataCreateUser());
     

    $user= User::create($validatedData);
	Auth::login($user);

    return redirect(route('private'));
  
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

public function updateUser (Request $request){

$validatedData= $request->validate($this->validateDataUpdateUser());

/** @var \App\Models\User $user */
$user= Auth::user();
$user->update($validatedData);

return redirect(route('private'))->with('success', 'El usuario se ha actualizado correctamente');

}


public function destroy(Request $request){

    /** @var \App\Models\User $user */
$user= Auth::user();
Auth::logout();
$user->delete();
$request->session()->invalidate();
$request->session()->regenerateToken();

return redirect(route('login-index'));

}


private function validateDataCreateUser(){

return [
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
        'surname' =>['required'],
        ['password.required'=> 'La contraseña es obligatoria',
        'password.*'=> 'La contraseña debe tener 8 caracteres, una letra y un número',
    ]];

}

private function validateDataUpdateUser(){

return [
        'name'=> ['required'],
        'email' => ['required','email:dns,rfc,strict', Rule::unique('users', 'email')->ignore(Auth::id())],
         'telephone'=> ['required'],
        'street_type'=> ['sometimes','nullable'],
        'street_name'=> ['sometimes','nullable'],
        'number'=> ['sometimes','nullable'],
        'postcode'=> ['sometimes','nullable'],
        'city'=> ['sometimes','nullable'],
        'country'=> ['sometimes','nullable'],
        'username'=> ['required', Rule::unique('users', 'username')->ignore(Auth::id())],
        'surname' =>['required']];
}
     


}
