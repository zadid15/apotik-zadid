<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        $validate  = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'hak_akses' => 'required',
        ]);

        $simpan_user = User::create($validate);

        if ($simpan_user) {
            $id_user = $simpan_user->id;
            $simpan_detailUser = DetailUser::create([
                'id_user' => $id_user,
            ]);
            if ($simpan_detailUser) {
                return redirect('/');
            }else{
                return redirect('/register');
            }
        } else {
            return redirect('/register');
        }
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validate)) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }
}
