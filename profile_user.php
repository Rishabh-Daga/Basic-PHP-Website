<?php
include('login.php');
include('user_process.php');
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
    <div>
        <form method='post' action="logout.php">
            <input type="submit" value="Logout" name="logout">
        </form>
    </div>
    <div>
        <form method="post" action="user_process.php">
            <textarea name="content" required="required"> </textarea>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>

    <?php
    $con=mysqli_connect("localhost","root","1234","weswitch");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $x = $_SESSION['name'];
    $result = mysqli_query($con,"SELECT post as Blog, approved as Editor_Approval, published as Admin_Approval FROM content where username='$x'");

    echo "<table border='1'>
    <tr>
    <th>Post</th>
    <th>Editor Approval</th>
    <th>Admin Approval</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Blog'] . "</td>";
        echo "<td>" . $row['Editor_Approval'] . "</td>";
        echo "<td>" . $row['Admin_Approval'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($con);
    ?>
    
    </body>
</hmtl>
