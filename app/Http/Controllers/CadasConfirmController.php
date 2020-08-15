<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class CadasConfirmController extends Controller
{
    public function confirmacao($email, $token) {

        $email = Auth::user()->email;
        $token = Auth::user()->token;

        $user = User::where(['email'=>$email, 'token'=>$token])->first();
            
            $user->status = 1;
            $user->token = NULL;
            
            if($user->update())
            {
                 return view('approval');
            }
                else
                {
                    Auth::logout();
                    return redirect('login');
                }
        
    }
}
