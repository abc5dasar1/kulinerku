<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function loginHere(Request $request){
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if ($user->role == 'members') {
            if(password_verify($request->password, $user->password)){
                return 'berhasil';
            }
            else{
                return "Gagal";
            }
        }
        else{
            if(password_verify($request->password, $user->password)){
                return 'berhasil';
            }
            else{
                return "Gagal";
            }
        }

    }
    public function logout()
    {
        $this->middleware('guest')->except('logout');
    }
}
