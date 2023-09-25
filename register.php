<?php
session_start();


if (!isset($_SESSION['username'])) {
    
    header('Location: logincheck.html');
    exit;
}


$username = $_SESSION['username'];
?>


<?php

 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment";

  
    $con = mysqli_connect($host, $username, $password, $dbname);

    
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) 
    {
        $uname = $_REQUEST['username'];
        $uemail = $_REQUEST['email'];
        $upassword = $_REQUEST['password'];
    

        
        $sql = "INSERT INTO login VALUES ('0', '$uname', '$uemail', '$upassword')";
  
       
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            echo "Entries added!";
        }
  
        
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<head><meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="main.css">
</head>
<body>
<center>

    <img src="logo.png">
    <h1>Register a New User</h1>

    <form method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required></input><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required></input><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required></input><br><br>

        <input type="submit" name="submit" id="submit" value="Submit">
    </form>

    <br><br><br>
    <a href="main.html">Back:</a><br><br>

</center>
</body>
</html>