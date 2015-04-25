<div class="row">
    <div class="contain-to-grid">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="" ><?php //echo $user->data()['username']; ?></a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="active"><a href="./logout.php" >Log out</a></li>
                </ul>

                <!-- Left Nav Section -->
                <ul class="left hide">
                    <li><a href="#">Left Nav Button</a></li>
                </ul>
            </section>
        </nav>
    </div>
</div><br>
<div class="row">
    <div class="large-3 columns th" id="side">
        <ul class="side-nav">
            <li><a href="./">Home</a></li>
            <li><a href="#">Add Question</a></li>
            <li><a href="#">View Questions</a></li>
            <li><a href="#">Add Subjects</a></li>
            <li><a href="#">View Subjects</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="./logout.php">Log Out</a></li>
        </ul>
    </div>

    <div class="large-6 columns" id="dashmain">
       
        <form action="" method="post">
            <div class="large-12 columns">
                <textarea name="question" id="" rows="10" placeholder="Enter Question"></textarea>
            </div>
            <div>
                <div class="large-8 columns">
                    <input type="text" name="option1" placeholder="Enter Your 1 Option" />
                </div>
                <div class="large-4 columns">
                    <input type="radio" name="answer" value="answer1" id="answer1"><label for="answer1">Answer</label>
                </div>
            </div>
            <div>
                <div class="large-8 columns">
                    <input type="text" name="option2" placeholder="Enter Your 2 Option" />
                </div>
                <div class="large-4 columns">
                    <input type="radio" name="answer" value="answer2" id="answer2"><label for="answer2">Answer</label>
                </div>
            </div>
            <div>
                <div class="large-8 columns">
                    <input type="text" name="option3" placeholder="Enter Your 3 Option" />
                </div>
                <div class="large-4 columns">
                    <input type="radio" name="answer" value="answer3" id="answer3"><label for="answer3">Answer</label>
                </div>
            </div>
            <div>
                <div class="large-8 columns">
                    <input type="text" name="option4" placeholder="Enter Your 4 Option" />
                </div>
                <div class="large-4 columns">
                    <input type="radio" name="answer" value="answer4" id="answer4"><label for="answer4">Answer</label>
                </div>
            </div>

                <input type="hidden" name="mt" value="mt">
            <div>
                <div class="large-8 columns">
                    <input type="submit" name="enter" value="Add Question" class="button small round" />
                </div>
            </div>
        </form>

    </div>

    <div class="large-3 columns th" id="rightSide">
        <div class="row">
            <div class="large-12 large-centered columns">
                    <select >
                        <option value="">Select Subject</option>
                        <?php foreach($subject as $row):?>
                            <option value="<?php echo $row['subject'];?>"><?php echo $row['subject'];?></option>
                        <?php endforeach ;?>
                    </select>


            </div>
        </div><hr>
        <div class="row">
            <div class="large-12 large-centered columns">
                <form action="" method="post">
                      <div class="row">
                       
                        <div class="large-12 columns">
                          <div class="row collapse postfix-round">

                            <div class="large-9 columns">
                              <input type="text" name="subject" placeholder="Enter New Subject">
                            </div>
                                <input type="hidden" name="sub" value="sub">
                            <div class="small-3 columns">
                              <input type="submit" class="button postfix" name="submit" value="Submit" > 
                            </div>

                          </div>
                        </div>

                      </div>
                </form>
            </div>
        </div>
    </div>

</div>

