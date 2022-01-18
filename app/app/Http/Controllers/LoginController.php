<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $validated = $request->except(['_token']);
      
        $user = User::where(['login' => $validated['login']])->first();

    if($user!=null  ){
        if($user->passwordValidate($validated['password'])){
              Auth::login($user,($validated['password']=='on') );
                return redirect()->route('home');
        }
         
        return back()->withErrors([
            'password' => 'Пароль не верный',
        ]);
    }
    return back()->withErrors([
        'login' => 'Пользователь не найден',
    ]);

  
}
}
