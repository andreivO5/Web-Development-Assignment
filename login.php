<?php


session_start();


$host = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";
$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) {
    
    $u_name = $_POST['username'];
    $u_password = $_POST['password'];

    
    $sql = "SELECT * FROM login WHERE username='$u_name'";
    $result = $conn->query($sql);

    
    if (mysqli_num_rows($result) == 1) 
    {
        
        $row = mysqli_fetch_assoc($result);
        if ($u_password == $row['password']) 
        {
            
            $_SESSION['username'] = $u_name;
            header("location: main.html");
        } 
        else 
        {
            echo "Incorrect password";
        }
    } 
    else 
    {
        echo "Username does not exist";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
</head>
<style>
body 
{
    background-image: url('background.jpg');
    background-repeat: no-repeat;
}
</style>
<body>
<center>

<img src="logo.png">
<h1>Login</h1>

<?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
    <p><?php echo $u_password; ?></p>
<?php } ?>

<form method="post">
    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" name="submit" value="Login">
</form>

<br><br><br>
    <a href="main.html">Back:</a><br><br>

</center>
</body>
</html>
