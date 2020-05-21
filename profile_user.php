<?php
include('login.php');

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
<h1>Homepage : <?php echo $_SESSION['name']; ?> </h1>
    <form method='post' action="logout.php">
        <input type="submit" value="Logout" name="logout">
    </form>
    <form>
        <textarea id="content" name="content" value="content"> </textarea>
        <input type="submit" value="submit" name="submit">
        <?php 

        $link = mysqli_connect("localhost", "root", "1234", "weswitch");
        if(!$link){
            die('Could not Connect My Sql:' .mysql_error());
        }

        $text = mysqli_real_escape_string($link, $_REQUEST['content']);
        $name = $_SESSION['name'];

        if(isset($_POST['submit']))
        {	 
            $sql = "INSERT INTO content (name, text, approved_by_editor, approved_by_admin) VALUES ('$name, '$text', 0, 0)";
            if (mysqli_query($link, $sql)) {
                echo "New blog created successfully !";
            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        ?>
</div>
</body>
</hmtl>
