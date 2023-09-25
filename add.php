<?php
require_once "database.php";
if (isset($_POST['pname']) && isset($_POST['ptype']) && isset($_POST['quantity']))
{
$n = $con -> real_escape_string ($_POST['pname']);
$t = $con ->real_escape_string ($_POST['ptype']);
$q = $con -> real_escape_string ($_POST['quantity']);
$sql = "INSERT INTO products (pname, ptype, quantity)
VALUES ('$n', '$t', '$q')";
echo "<pre>\n$sql\n</pre>\n";
$con->query($sql);
echo 'Success <a href="products.php">Continue...</a>';
return;
}
?>
<p>Add A New Product</p>
<form method="post">
<p>Product Name:
<input type="text" name="pname"></p>
<p>Product Type:
<input type="text" name="ptype"></p>
<p>Quantity:
<input type="number" name="quantity"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>