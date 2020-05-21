<?php

$error = '';
session_start();

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "1234", "weswitch");

if($link === false) {
    die("Connection failed: ".mysqli_connect_error());
}

if(isset($_POST["submit"])) {

    $name = mysqli_real_escape_string($link, trim($_POST['name']));
    $password = mysqli_real_escape_string($link, trim($_POST['password']));
    
    if ($name != "" && $password != ""){
        
        $query = "SELECT * FROM users WHERE name='$name' AND password='$password'";
        
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $row['name'];
            $_SESSION['type'] = $row['type'];
            if ($row['type'] == 'user')
                header('Location: profile_user.php');
            if ($row['type'] == 'editor')
                header('Location: profile_editor.php');
            if ($row['type'] == 'admin')
                header('Location: profile_admin.php');
            
        }
        else {
            $error = "Name or password is invalid";
        }
    }
    mysqli_close($link);
}

?>