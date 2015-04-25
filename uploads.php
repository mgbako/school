<?php
require_once 'core/init.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(Image::exist('image'))
    {
        if(Image::size('image')<=5000000)
        {
            $image = addslashes($_FILES['image']['tmp_name']);
            $name = addslashes($_FILES['image']['name']);
            $image = file_get_contents($image);
            $image = base64_encode($image);

            pretag(Image::getImage('image')."<br>");
            echo '<img class="th" height="400" width="300" src="data:image;base64,'.Image::getImage('image').'"><br>';
            echo Image::name('image')."<br>";
            echo Image::size('image')."<br>";
            echo Image::getImage('image')."<br>";
            pretag(getimagesize($_FILES['image']['tmp_name'])[3]);

            echo "\n<br />".Image::type('image');
            /*saveImage($name, $image);*/
        }
        else{
            echo "Image is too Large";
        }
       
    }
    else
    {
        echo "please select an image";
    }
}

function saveImage($name, $image)
{
    $db = new Database();

    $result = $db->insert('images', [
        'name' => $name,
        'image' => $image
    ]);

    if($result)
    {
        echo "<br>image Uploaded.";
      //  header('Location: uploads.php');
    }
    else
    {
        echo "<br>Image not uploaded.";
    }
}

function displayImage()
{
    $db = new Database();
    //$db->where('id', 1);
    $rows = $db->get('images');

    foreach($rows as $row)
    {
       // echo "{$row['name']}";
    echo '<img class="th" height="100" width="100" src="data:image;base64,'.$row['image'].'">';
    }

}


?>

<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
    <meta charset="utf-8">
    <!-- If you delete this meta tag World War Z will become a reality -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation 5</title>

    <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="./public/css/foundation.css">

    <!-- If you are using the gem version, you need this only -->
    <link rel="stylesheet" href="css/app.css">

    <script src="js/vendor/modernizr.js"></script>

</head>
<body>


<div class="row">
    <div class="large-6 large-centered columns" >
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="file" name="image" value="Image">
            <input type="submit" name="submit" class="button small round">
            <div>
                <em>Date of Birth</em><input type="date" name="dob"/>
            </div>
        </form>
    </div>

    <div class="large-12 column">
        <?php //displayImage(); ?>
    </div>
</div>
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>