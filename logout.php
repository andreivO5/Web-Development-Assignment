<?php
session_start();


if (!isset($_SESSION['username'])) {
    
    header('Location: logincheck.html');
    exit;
}


$_SESSION = array();


session_destroy();
?>

<!DOCTYPE html>
<head><meta charset="UTF-8">
<title>Logout</title>
<link rel="stylesheet" href="main.css">
</head>
<body>
<center>

    <img src="logo.png">
    
    <h1>Logout successful.</h1>
    <br><br>
    <a href="main.html">Back to main page:</a><br><br>
    <a href="login.php">Login Page:</a><br><br>

</center>
</body>
</html>