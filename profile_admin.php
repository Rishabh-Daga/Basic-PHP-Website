<?php
include('session.php');
 
if(!isset($_SESSION['name'])) {
    header("location: signin.php");
}

if(isset($_POST['logout'])){
    session_destroy();
    header('Location: signin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>My Home Page</title>
</head>
<body>
<h1>Homepage <?php echo $_SESSION['name']; ?></h1>
    <form method='post' action="logout.php">
        <input type="submit" value="Logout" name="logout">
    </form>
</div>
</body>
</hmtl>
