<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) {
        // validamos los datos que sean correctos
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            // Este campo tiene que tener el mismo nombre del de arriba + '_confirmation'. ejemplo : 'nombreCampoPass_confirmation'
            // 'password_confirmation'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $user->save();

        return response()->json([
            "status"=> 1,
            "msg" => "registro de usuario exitoso!",
        ]);

    }
    public function login(Request $request) {
        
    }
    public function userProfile() {

    }
    public function logout() {
        
    }
}

