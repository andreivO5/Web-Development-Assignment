<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $pname = $_POST["pname"];
  $ptype = $_POST["ptype"];
  $quantity = $_POST["quantity"];

  $sql = "UPDATE products SET pname=?, ptype=?, quantity=? WHERE ProductID=?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ssii", $pname, $ptype, $quantity, $id);
  $stmt->execute();

  header("Location: products.php");
  exit();
} else {
  $id = $_GET["id"];

  $sql = "SELECT pname, ptype, quantity FROM products WHERE ProductID=?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  $row = $result->fetch_assoc();
  $pname = $row["pname"];
  $ptype = $row["ptype"];
  $quantity = $row["quantity"];

  $con->close();
?>

<h2>Edit Product</h2>
<form method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <label for="pname">Product Name:</label>
  <input type="text" name="pname" value="<?php echo $pname; ?>"><br>
  <label for="ptype">Product Type:</label>
  <input type="text" name="ptype" value="<?php echo $ptype; ?>"><br>
  <label for="quantity">Quantity:</label>
  <input type="number" name="quantity" value="<?php echo $quantity; ?>"><br>
  <input type="submit" value="Save">
</form>

<?php } ?>
