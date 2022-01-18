<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(AuthRequest $request)
    {

        //$validated = $request->safe()->only(['login', 'email']);
        // $validator=$request->validated();


        if (User::create($request->validated())) {
            return view('auth.register')
                ->with('result', 'Вы успешно зарегистрировались')
                ->with('status', true);


        };
        return view('auth.register')
            ->with('result', 'Произошла ошибка при резистрации. Попробуйте еще')
            ->with('status', false);

    }
}
