
    <div class="row" id="nav">
        <div class="contain-to-grid">
            <nav class="top-bar" data-topbar role="navigation">
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="" ><?php echo $user->data()['username']; ?></a></h1>
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
    <div class="small-3 large-3 columns" id="side">
        <ul class="side-nav">
        <li><img class="profile th" src="data:image;base64,<?php echo $user->data()['image']; ?>" /></li>
            <li><a href="./">Home</a></li>
            <li><a href="#">Add Question</a></li>
            <li><a href="#">View Questions</a></li>
            <li><a href="./addSubject.php">Add Subjects</a></li>
            <li><a href="#">View Subjects</a></li>
            <li><a href="./addStudent.php">Students</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="./logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="large-8 columns" id="dashmain">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-6">
            <li><a href="./"><img src="./public/img/home.jpg" class="th"><p>Home</p></a></li>
            <li><a href="./addQuestion.php"><img src="./public/img/addQuestion.png" class="th"><p>Question</p></a></li>
            <li><a href="#"><img src="./public/img/viewQuestion.png" class="th"><p>View Questions</p></a></li>
            <li><a href="#"><img src="./public/img/addSubject.jpg" class="th"><p>Subjects</a></p></li>
            <li><a href="./addStaff.php"><img src="./public/img/user.jpg" class="th"><p>Staffs</p></a></li>
            <li><a href="#"><img src="./public/img/profile.png" class="th"><p>Students</a></p></li>
            <li><a href="#"><img src="./public/img/user.jpg" class="th"><p>Profile</a></p></li>
            <li><a href="./logout.php"><img src="./public/img/logout.png" class="th"><p>Log Out</p></a></li>
        </ul>
    </div>

</div>