<div class="large-6 columns">
    <h1>Register New User</h1>
    <form action="" method="post">
        <div class="row">
           <input type="text" name="username" value="<?php echo escape(Input::get('username'));?>" id="username" placeholder="Username"/>
        </div>

        <div class="row">
            <input type="password" name="password" value="<?php echo escape(Input::get('password'));?>" id="password" placeholder="Password"/>
        </div>

        <div class="row">
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"/>
        </div>

        <div class="row">
            <input type="text" name="name" value="<?php echo escape(Input::get('name'));?>" id="name" placeholder="Name"/>
        </div>

        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
        <input type="submit" name="submit" value="Register" class="button radius"/>
    </form>
</div>