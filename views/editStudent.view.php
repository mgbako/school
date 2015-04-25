<div class="row">
    <div class="large-6 large-centered columns">
        <div class="large-12 columns"><h1 class="text-center">Update Student Profile</h1></div>
        <?php foreach($students as $student):?>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="firstName" value="<?php echo escape($student['firstName']);?>" id="name" placeholder="First Name"/>
                </div>
                <div>
                    <input type="text" name="lastName" value="<?php echo escape($student['lastName']);?>" id="name" placeholder="Last Name"/>
                </div>
                <div>
                    <input type="text" name="otherName" value="<?php echo escape($student['otherName']);?>" id="name" placeholder="Other Names"/>
                </div>


                <div>
                    <em>Date of Birth</em><input type="date" name="dob"/>
                </div>
                <div>
                    <input type="text" name="address" value="<?php echo escape($student['address']);?>" placeholder="Address"/>
                </div>
                <div>
                    <input type="tel" name="phone" value="<?php echo escape($student['phone']);?>" id="phone" placeholder="Phone Number"/>
                </div>
                <div>
                    <input type="text" name="state" value="<?php echo escape($student['state']);?>" id="name" placeholder="State Of Origin"/>
                </div>
                <div>
                    <input type="text" name="nationality" value="<?php echo escape($student['nationality']);?>" id="name" placeholder="Nationality"/>
                </div>

                <div>
                    <select name="class">
                        <option>-- Select Your Class --</option>
                        <option>JSS1</option>
                        <option>JSS2</option>
                        <option>JSS3</option>
                        <option>SSS1</option>
                        <option>SSS2</option>
                        <option>SSS3</option>
                    </select>
                </div>

                <div>
                    Select An Image<input type="file" name="image" placeholder="Select An Image"/>
                </div>
                <input type="hidden" name="imageName" value="<?php echo Image::name('image'); ?>" />
                <input type="submit" name="login" value="Submit" class="button small radius"/>
            </form>
        <?php endforeach;?>
        <a href="./">Home</a>
    </div>
</div>
