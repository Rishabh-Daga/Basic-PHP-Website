<?php

$link = mysqli_connect("localhost", "root", "1234", "weswitch");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$type = mysqli_real_escape_string($link, $_REQUEST['type']);
 
// Attempt insert query execution
if(isset($_POST['submit']))
{
    $sql = "INSERT INTO users (name, email, password, type) VALUES ('$name', '$email', '$password', '$type')";
    if(mysqli_query($link, $sql)){
        echo "Registered successfully.".mysqli_query($link, $sql);
        header('Location: signin.php');
    }
    else {
        echo "ERROR: Could not able to execute $sql.".mysqli_error($link);
    }
}
 
// Close connection
mysqli_close($link);
?>