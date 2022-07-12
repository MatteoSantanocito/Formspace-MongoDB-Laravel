<html>
    <head>
        <title>Signup - FormSpace</title>
        <link rel="stylesheet" href="{{ asset('styles/signup.css')}}">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="{{asset('js/signup.js')}}" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <article>
            <main>
                <form method="post" name="signup_form" autocomplete="off" action="{{ route('signup')}}"> 
                    @csrf
                    <h1>Registrati</h1>
                    <div class="row">
                        <input type="text" name="name" placeholder="Nome" class="box" value='{{ old("name") }}'>
                        <input type="text" name="lastname" placeholder="Cognome" class="box" value='{{ old("lastname") }}'>
                    </div>
                    <div class="row">
                        <input type="text" name="email" placeholder="Email" class="box" value='{{ old("email") }}'>
                    </div>
                    <div class="row">
                        <input type="text" name="username" placeholder="Username" class="box" value='{{ old("username") }}'>
                        <input type="password" name="password" placeholder="Password" class="box" value='{{ old("password") }}'>
                    </div>
                    <input id="signup_button" type="submit" value="Registrati" class="btn">
            <p> Hai già un account? <a href = "{{ url('login') }}"> Login</a></p>
                </form>
            </main>
        </article>
    </body>
</html>