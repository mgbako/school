<div class="row">
    <div class="large-12 columns">
        <div class="large-2 columns"><h1>Login</h1></div>
        <form action="" method="post">
            <hr>
            <div class="">
                <input type="text" name="username" value="<?php echo escape(Input::get('username'));?>" id="username" placeholder="Username" autocomplete="off"/>
            </div>

            <div class="">
                <input type="password" name="password" value="<?php echo escape(Input::get('password'));?>" id="password" placeholder="Password" autocomplete="off"/>
            </div>
            <div class="">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember" /> Remember me
                </label>
            </div>

            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
            <input type="submit" name="login" value="Login" class="button small radius"/>
        </form>
        <div class="large-2">
            <a href="./register.php"><h5>Register</h5></a>
        </div>
    </div>
</div>
