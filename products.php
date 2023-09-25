<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header('Location: logincheck.html');
    exit;
}

// If the user is logged in, you can retrieve their username from the session variable:
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<head><meta charset="UTF-8">
<title>Products Database</title>
<link rel="stylesheet" href="main.css">
</head>
<body>
<center>

    
    <img src="logo.png">
    
    
    <h1>AV Pharmaceuticals Inventory:</h1>
    <br><br>

    <?php
    require_once "database.php";
    $sql = "SELECT ProductID, pname, ptype, quantity FROM products";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {

    echo "<table border='1'>";
    while ($row = $result->fetch_assoc()) 
    {
        echo "<tr><td>";
        echo (htmlentities ($row ["pname"]));
        echo ("</td><td>");
        echo (htmlentities ($row ["ptype"]));
        echo ("</td><td>");
        echo (htmlentities ($row ["quantity"])) ;
        echo ("</td><td>\n");
        echo ('<a href="edit.php?id='.htmlentities ($row ["ProductID"]).'">Edit</a> / ');
        echo ('<a href="delete.php?id='.htmlentities($row ["ProductID"]).'">Delete</a>');
        echo ("</td></tr>\n");
    } 
    } 
    else 
    {
        echo "0 results";
    }
    $con->close();
    ?>
    </table>
    <br><br>
    <a href="add.php">Add New</a><br><br>
    <a href="main.html">Back:</a><br><br>

</center>
</body>
</html>