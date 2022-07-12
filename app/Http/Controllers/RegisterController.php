<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function signup(){
      if(session('username') != null){
          return redirect('home');
      }else{
          return view('signup');
      }
    }

     //deve visualizzare quel form
    public function create()
    {
        if(session('username') != null){
            return redirect('home');
        }

        //leggiamo i dati della richiesta post che viene effettuato a questo controller tramite la funzione request
        $request = request();

        //se non ho errori, allora scrivo
        if($this->checkErrors($request) == 0) {

              //anzichè effettuare la connessione e poi fare la query ogni volta, chiamiamo la funzione Create e passiamo tutti i campi
              $newUser = new User;
              $newUser->name = $request['name'];
              $newUser->lastname = $request['lastname'];
              $newUser->email = $request['email'];
              $newUser->username = $request['username'];
              $newUser->password = $request['password'];
              $newUser->save();

             //reindirizziamo alla home dopo che è stato registrato con successo
            if($newUser) {
                return redirect('home'); //redirect alla views home
            }
        }
        //in caso contrario riporto sulla pagina con gli ultimi input che ha inserito
        else {
            return redirect('signup')->withInput();
        }
    }

    public function  checkErrors($data){

        //deve fare esattamente quello che facevamo prima
        //controllare che tutti i campi sono corretti

        $error = array();
        //questa funzione deve:
        //validare i dati (se i dati non sono corretti torneremo al form)
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }

        if(strlen($data["password"]) < 8) {
            $error[] = "Password troppo corta";
        }

        if(strlen($data['name'] == 0)) {
            $error[] = "Nome non valido";
        }

        if(strlen($data['lastname']) == 0) {
            $error[] = "Cognome non valido";
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);

    }

    public function checkUsername($username){
        $exist = User::where('username', $query)->exists();
        return['exists' => $exist];
    }

    public function checkEmail($email){
        $exist = User::where('email', $query)->exists();
        return['exists' => $exist];
    }

}
