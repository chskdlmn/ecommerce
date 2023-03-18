<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve data from the products table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Display the products
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["product_name"] . "</h2>";
        echo "<p>" . $row["product_desc"] . "</p>";
        echo "<p>Price: $" . $row["price"] . "</p>";
        echo "<form action='checkout.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $row["product_id"] . "'>";
        echo "<label for='quantity'>Quantity:</label>";
        echo "<input type='number' name='quantity' value='1'>";
        echo "<input type='submit' value='Buy now'>";
        echo "</form>";
    }
} else {
    echo "No products found";
}

$conn->close();
?>

<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve data from the products table
$product_id = $_POST["product_id"];
$quantity = $_POST["quantity"];

$sql = "SELECT * FROM products WHERE product_id = " . $product_id;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$product_name = $row["product_name"];
$price = $row["price"];

// Display the checkout form
echo "<h2>Checkout</h2>";
echo "<form action='confirm_order.php' method='POST'>";
echo "<label for='product_name'>Product Name:</label>";
echo "<input type='text' name='product_name' value='" . $product_name . "' readonly><br>";
echo "<label for='price'>Price:</label>";
echo "<input type='text' name='price' value='" . $price . "' readonly><br>";
echo "<label for='quantity'>Quantity:</label>";
echo "<input type='number' name='quantity' value='" . $quantity . "'><br>";
echo "<label for='recipient_name'>Recipient Name:</label>";
echo "<input type='text' name='recipient_name'><br>";
echo "<label for='address'>Address:</label>";
echo "<input type='text' name='address'><br>";
echo "<label for='contact_number'>Contact Number:</label>";
echo "<input type='text' name='contact_number'><br>";
echo "<input type='hidden' name='product_id' value='" . $product_id . "'>";
echo "<input type='submit' value='Confirm Order'>";
echo "</form>";

$conn->close();
?>
