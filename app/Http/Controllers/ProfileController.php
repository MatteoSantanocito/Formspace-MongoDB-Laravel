<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProfileController extends BaseController{

    public function index(){
        if(session('username') == null){
            return redirect('login');
        } else {
            $user = $this->getUserInfo(session("username"));
            return view('profile')->with("user", $user);
        }
    }

    private function getUserInfo($username){
        $user = User::where('username', $username)->first();
        return $user;
    }

    public function getPosts($user_id){
        $posts = Post::where("username", session("username"))->get();

        return $posts;
    }

    public function createPost(){
        $request = request();
        $newPost = new Post;
        $newPost->title = $request['title'];
        $newPost->content = $request['comment'];
        $newPost->username = session("username");
        $newPost->num_likes = 0;
        $newPost->num_comments = 0;
        $newPost->save();

        if($newPost){
            return redirect('home');
        }

    }

    public function spotify_track($track){ 
        $client_id = '4e5ec5f49f504198805e6bd7285f5253';
        $client_secret = 'e0fec4ef01344931835066c3344654c1';

        $urltoken="https://accounts.spotify.com/api/token";
        $track=urlencode($track);

        //RICHIESTA TOKEN
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urltoken);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //eseguo la POST
        curl_setopt($curl, CURLOPT_POST, 1);
        //body
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        //head
        $head = array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $head);

        $token =json_decode(curl_exec($curl), true);
        curl_close($curl);

        //RICERCA TRACCIA
        $urlSpotify="https://api.spotify.com/v1/search?type=track&q=";
        $url=$urlSpotify .$track;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //header e token
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token["access_token"])); 
        $result=curl_exec($curl);
        
        return $result;
        curl_close($curl);
    }

}



?>