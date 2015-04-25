<div class="row">
    <div class="large-6 large-centered columns">
        <div class="large-12 columns"><h1 class="text-center">Add Staff</h1></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <input type="text" name="firstName" value="<?php echo escape(Input::get('firstName'));?>" id="name" placeholder="First Name"/>
            </div>
            <div>
                <input type="text" name="lastName" value="<?php echo escape(Input::get('lastName'));?>" id="name" placeholder="Last Name"/>
            </div>
            <div>
                <input type="text" name="otherName" value="<?php echo escape(Input::get('otherName'));?>" id="name" placeholder="Other Names"/>
            </div>

            <div>
                <input type="text" name="username" value="<?php echo escape(Input::get('username'));?>" id="username" placeholder="User Name"/>
            </div>
            <div>
                <input type="email" name="email" value="<?php echo escape(Input::get('email'));?>" id="email" placeholder="Email Address"/>
            </div>
            <div>
                <input type="password" name="password" value="<?php echo escape(Input::get('password'));?>" id="password" placeholder="Password"/>
            </div>
            <div>
                <input type="password" name="confirmPassword" value="<?php echo escape(Input::get('confirmPassword'));?>" id="confirmPassword" placeholder="Confirm Password"/>
            </div>

            <div>
                <em>Date of Birth</em><input type="date" name="dob"/>
            </div>
            <div>
                <input type="text" name="address" value="<?php echo escape(Input::get('address'));?>" placeholder="Address"/>
            </div>
            <div>
                <input type="tel" name="phone" value="<?php echo escape(Input::get('phone'));?>" id="phone" placeholder="Phone Number"/>
            </div>
            <div>
                <input type="text" name="state" value="<?php echo escape(Input::get('state'));?>" id="name" placeholder="State Of Origin"/>
            </div>
            <div>
                <input type="text" name="nationality" value="<?php echo escape(Input::get('nationality'));?>" id="name" placeholder="Nationality"/>
            </div>

            <div>
                <select name="types" value="<?php echo escape(Input::get('types'));?>">
                    <option>Select Type Of Staff</option>
                    <option>Administrator</option>
                    <option>Principal</option>
                    <option>Staff</option>
                    <option>Teacher</option>
                </select>
            </div>

            <div>
                Select An Image<input type="file" name="image" placeholder="Select An Image" value="<?php echo Image::name('image'); ?>" />
            </div>
            <input type="hidden" name="imageName" value="<?php echo Image::name('image'); ?>" />
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
            <input type="submit" name="login" value="Submit" class="button small radius"/>
        </form>
        <a href="./">Home</a>
    </div>
</div>
