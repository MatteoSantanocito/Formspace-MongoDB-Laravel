<!DOCTYPE html>
<html>
    <head>
        <title>I tuoi Post - FormSpace</title>

        <link rel="stylesheet" href="{{asset('styles/profile.css')}}">
        <link rel="stylesheet" href="{{asset('styles/spotify.css')}}">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="{{asset('js/profile.js')}}" defer></script>
        <script src="{{asset('js/spotify.js')}}" defer></script>
        
    </head>
    <body>
        <header>
          <div class="container">
            <div id="logo">

                <p>FormSpace</p>
            </div>

            <div id="profile" data-username={{$user["username"]}}>
                <div>
                {{$user["name"][0]}}{{$user["lastname"][0]}}
                </div>
                <p>
                {{$user["name"]}} {{$user["lastname"]}}
                </p>
            </div>
            <div id="profile_info" class="hidden">
                <div>
                    <h1>
                     {{$user["name"][0]}}{{$user["lastname"][0]}}
                    </h1>
                    <h2>
                      {{$user["username"]}}
                    </h2>
                    <h3>{{$user["email"]}}</h3>
                    <a href="{{route('logout')}}">Esci</a>
                </div>
          </div>
        </header>


<main>
        <div class="container">
         <div class="left">
             <a class="profile">
               <div class= "handle">
                 <h4> Benvenuto, </h4>
                 <p class= "text">
                   @ {{$user["username"]}}
                 </p>
               </div>
             </a>
             <div class= "sidebar">
               <a class="menu-item" id="Home" href="{{route('home')}}">
                   <span><i class="uil uil-house-user"></i></span><h3>Home</h3>
               </a>

               <a class="menu-item active" id="profilo" href="{{route('profile')}}">
                   <span><i class="uil uil-create-dashboard"></i></span><h3>I tuoi Post</h3>
               </a>

             </div>
           </br>
             <a for="create-post" class="btn btn-primary logout" href="{{route('logout')}}">Esci</a>

         </div>

      <div class= "middle">
        <article>

        </article>
      </div>

      <div class="right">
        <div class="post-spotify">
        <div class="GeneralInfo">
          <div class="title-spotify">
               <h1>Ascolta la tua musica</h1>
          </div>
          <div class="descrizione-spotify">
          <p>In questa sezione avrai la possiblità di cercare tutte le canzoni di milioni di artisti grazie a Spotify
          </p>
        </div>
        </div>
        <div class="search-spotify">
         <form name='element' class='element' id='search'>
         <label><input type='text' id='text' name='search' placeholder="Inserisci il titolo">
         </label><label><input type='submit' id="send" value="Cerca"></label>
          <article id="view" class="hidden"></article>
          <div id="NoElement" class= "hidden"> <p>Nessun risultato</p></div>
         </form>
       </div>
        </div>
    </div>
    </div>
        <div id="create_post_button">
            <i class="uil uil-pen"></i>
            <p>POST</p>
        </div>
        <div class="overlay hidden" id="add_post">
            <form class="post_form" method="post" name="post_form" action="{{route('createPost')}}">
               @csrf
                <input class="title_post" type="text" name="title" placeholder="Inserisci il Titolo">
                <input type="hidden" name="username" value={{$user["username"]}}>
                <textarea name="comment" class="comment_post" maxlength="500" placeholder="Inserisci la Descrizione del tuo post"></textarea>
                <div>
                    <span class="delete_post">Annulla</span>
                    <button class="publish_post">Pubblica</button>
                </div>
            </form>
        </div>

        <div class="overlay hidden" id="modify_post">
            <form class="post_form" method="post" name="modify_form" action="{{route('modifyPost')}}">
                @csrf
                <input class="title_post" type="text" name="title" placeholder="Modifica il Titolo">
                <input type="hidden" name="id" id="post_id">
                <textarea name="comment" class="comment_post" maxlength="500" placeholder="Modifica la Descrizione del tuo post"></textarea>
                <div>
                    <button class="publish_post">Modifica</button>
                </div>
            </form>
        </div>
      </main>
    </body>
</html>
