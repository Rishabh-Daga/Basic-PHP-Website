\<?php
include('login.php');
include('editor_process.php');
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
        <form method="post" action="editor_process.php">
        <?php
        $con=mysqli_connect("localhost","root","1234","weswitch");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($con,"SELECT username as User, post as Blog FROM content");

        echo "<table border='1'>
        <tr>
        <th>User</th>
        <th>Post</th>
        </tr>";
        $x = $_SESSION['$row["User"]'];
        $y = $_SESSION['$row["Blog"]'];
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $x . "</td>";
            echo "<td>" . $y . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
        <input type="submit" value="Approve" name="submit">
        </form>
    </div>
    </body>
</hmtl>