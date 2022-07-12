<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends BaseController
{

    public function login(){
        if(session('username') != null){
            return redirect('home');
        }else{
            return view('login')->with('errore', false);
        }
        
    }

    public function checkLogin(){
        //first ci da il primo e unico risultato che viene trovato
        $user = User::where('username', request('username'))->where('password', request('password'))->first();

        //se troviamo l'utente lo mandiamo alla home
        if($user !== null){ //o user->exists
            Session::put('username', $user->username);
            return redirect('home');
        } else {
            //se non lo troviamo setta la variabile errore a true 
            //per mostrare l'errore nella pagina di login
            return view('login')->with('errore', true);
        }
    }

    public function logout(){
        //elimina dati di sessione 
        Session::flush();
        return redirect('login');
    }

   
}

?>