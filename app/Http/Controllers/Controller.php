<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Controller
{

    public function login(Request $request) {

        $email = $request->input('email');
        $password = $request->input('password');

        $response = Http::get('http://localhost:3000/users');
        $data = $response->json();
        
        foreach ($data as $item) {
            
            if($email == $item['userEmail'] && $password == $item['userPassword']) {

                session(['userName' => $item['userName']]);
                $ok = true;

                return view('welcome', ['ok' => $ok]);

            } else {

                $error = true;
                return view('welcome', ['error' => $error]);
            }

        }
   

    }

    public function logout(Request $request) {

        $request->session()->forget('userName');
        return view('welcome');
    }

}
