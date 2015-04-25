<div class="row">
    <div class="large-6 large-centered columns">
        <div class="large-12 columns"><h1>Add New Subject</h1></div>
        <form action="" method="post">
            <hr>
            <div class="">
                <input type="text" name="name" value="<?php echo escape(Input::get('name'));?>" id="name" placeholder="Enter Subject"/>
            </div>

            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
            <input type="submit" name="login" value="Submit" class="button small radius"/>
        </form>
        <a href="./">Home</a>
    </div>
</div>
