<html>
    <head>
        <title>Login - FormSpace</title>
        <link rel="stylesheet" href="{{ url('styles/login.css')}}">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="{{asset('js/login.js')}}" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <article>
              <div class= "form-container">
                  <form name="login_form" method="post" action="{{ route('login') }}">
                  @csrf
                    <h3> Login </h3>
                    <input type="text" name="username" placeholder="Username" class="box" value='{{ old("username") }}'>
                    <input type="password" name="password" placeholder="Password" class="box">
                   
                    @if($errore)
                           <p class='errore'>Email o Password errata</p>
                    @endif

                    <input id="login_button" type="submit" value= "Accedi" class="btn">
                    <p> Non hai un account? <a href = "{{ url('signup') }}"> Registrati</a></p>
                    </form>

              </div>
        </article>
    </body>
</html>