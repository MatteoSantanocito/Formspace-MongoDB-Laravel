<html>
    <head>
        <title>Signup - FormSpace</title>
        <link rel="stylesheet" href="<?php echo e(asset('styles/signup.css')); ?>">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="<?php echo e(asset('js/signup.js')); ?>" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <article>
            <main>
                <form method="post" name="signup_form" autocomplete="off" action="<?php echo e(route('signup')); ?>"> 
                    <?php echo csrf_field(); ?>
                    <h1>Registrati</h1>
                    <div class="row">
                        <input type="text" name="name" placeholder="Nome" class="box" value='<?php echo e(old("name")); ?>'>
                        <input type="text" name="lastname" placeholder="Cognome" class="box" value='<?php echo e(old("lastname")); ?>'>
                    </div>
                    <div class="row">
                        <input type="text" name="email" placeholder="Email" class="box" value='<?php echo e(old("email")); ?>'>
                    </div>
                    <div class="row">
                        <input type="text" name="username" placeholder="Username" class="box" value='<?php echo e(old("username")); ?>'>
                        <input type="password" name="password" placeholder="Password" class="box" value='<?php echo e(old("password")); ?>'>
                    </div>
                    <input id="signup_button" type="submit" value="Registrati" class="btn">
            <p> Hai già un account? <a href = "<?php echo e(url('login')); ?>"> Login</a></p>
                </form>
            </main>
        </article>
    </body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hw2/resources/views/signup.blade.php ENDPATH**/ ?>