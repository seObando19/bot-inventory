<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function users(Request $request)
    {
        $users = User::all();
        /* if($request->has('active')){
            $users = User::where('active', true)->get();
        } else {
            $users = User::all();
        } */
        response()->json([
            "users" => $users
        ]);
    }

    public function login(Request $request)
    {
        //
    }

}
