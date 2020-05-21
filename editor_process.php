<?php
include('login.php');
include('profile_editor.php');
$link = mysqli_connect("localhost", "root", "1234", "weswitch");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['content'])) {
    $blog = mysqli_real_escape_string($link, $_REQUEST['content']);
}
$name = $_SESSION['name'];
// Attempt insert query execution
if(isset($_POST['submit']))
{
    $sql = "UPDATE content SET approved = 1 where username='$x' and post='$y'";
    if(mysqli_query($link, $sql)){
        echo "Saved successfully.";
        header('Location: profile_user.php');
    }
    else {
        echo "ERROR: Could not able to execute $sql.".mysqli_error($link);
    }
}

// Close connection
mysqli_close($link);
?>