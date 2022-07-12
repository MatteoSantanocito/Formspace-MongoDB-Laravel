<html>
    <head>
        <title>Login - FormSpace</title>
        <link rel="stylesheet" href="<?php echo e(url('styles/login.css')); ?>">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <script src="<?php echo e(asset('js/login.js')); ?>" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <article>
              <div class= "form-container">
                  <form name="login_form" method="post" action="<?php echo e(route('login')); ?>">
                  <?php echo csrf_field(); ?>
                    <h3> Login </h3>
                    <input type="text" name="username" placeholder="Username" class="box" value='<?php echo e(old("username")); ?>'>
                    <input type="password" name="password" placeholder="Password" class="box">
                   
                    <?php if($errore): ?>
                           <p class='errore'>Email o Password errata</p>
                    <?php endif; ?>

                    <input id="login_button" type="submit" value= "Accedi" class="btn">
                    <p> Non hai un account? <a href = "<?php echo e(url('signup')); ?>"> Registrati</a></p>
                    </form>

              </div>
        </article>
    </body>
</html><?php /**PATH /Users/matteo/Desktop/hw2/resources/views/login.blade.php ENDPATH**/ ?>