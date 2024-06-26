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
        $userFound = false;

        foreach ($data as $item) {
            
            if($email == $item['userEmail'] && $password == $item['userPassword']) {

                session(['userName' => $item['userName']]);
                $userFound = true;
                break;
                
            }  
        
        }
            
            if ($userFound) {

                $ok = true;
                return view('welcome', ['ok' => $ok]);
            } else {

                $error = false;
                return view('welcome',['error' => $error]);

            }

       
   

    }

    public function pokemons() {

    

        $response = Http::get("https://pokeapi.co/api/v2/pokemon?limit=68&offset=0");
        $data = $response->json();

        $name = $data['results'];

      

        return view('dashboard',['name' => $name]);

    }

    public function sendPokemon(Request $request) {

        $key = $request->input('key');

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/$key");
        $data = $response->json();

        return view('result',['data' => $data]);

    }

    public function search(Request $request) {

        $pokemonName = $request->input('pokemonName');

        $response = Http::get("https://pokeapi.co/api/v2/pokemon/$pokemonName");
        $data = $response->json();

        if($response) {

            return view('result',['data' => $data]);

        } else {

            $error = true;
            return view('result',['error' => $error]);

        }



    }


    public function signup(Request $request) {  

        $userName = ucfirst(strtolower($request->input('userName')));
        $email = $request->input('email');
        $password = $request->input('password');
    
      
        $response = Http::get('http://localhost:3000/users');
        $data = $response->json();
    
      
        $emailExists = false;
        foreach ($data as $item) {
            if ($item['userEmail'] == $email) {
                $emailExists = true;
                break;
            }
        }
    
        if ($emailExists) {
            $error = true;
            return view('signup', ['error' => $error]);
        } else {
            $body = [
                'userName' => $userName,
                'userEmail' => $email,
                'userPassword' => $password
            ];
    
           
            Http::post('http://localhost:3000/users', $body);
            
            $ok = true;
            return view('signup', ['ok' => $ok]);
        }
    }


    
        

    public function logout(Request $request) {

        $request->session()->forget('userName');
        return view('welcome');
    }

}
