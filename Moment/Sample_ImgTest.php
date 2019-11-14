<?php
if (isset($_FILES["ProfileImage"]["name"]))
{

    $name = $_FILES["ProfileImage"]["name"];
    $tmp_name = $_FILES['ProfileImage']['tmp_name'];
    $error = $_FILES['ProfileImage']['error'];

    if (!empty($name))
    {
        $location = 'ProfileImages/';

        if (move_uploaded_file($tmp_name, $location . $name))
        {
            echo 'Uploaded';
        }
    } else
    {
        echo 'please choose a file';
    }
}
?>

<form action="#" method="POST" enctype="multipart/form-data">
    <input type="file" name="ProfileImage"><br><br>
    <input type="submit" value="Submit">
</form>