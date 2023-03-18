<?php
    include_once "conn_db.php"; // Include database connection code

    if(isset($_GET['item_id'])){ // Check if item ID is present in URL
        $item_id = $_GET['item_id']; // Capture item ID from URL

        // Create SQL query to delete item from products table
        $sql = "DELETE FROM products WHERE item_id = '$item_id'";
        
        if(mysqli_query($conn, $sql)){ // Check if query was successful
            echo "Product deleted successfully!";
        } else {
            echo "Error deleting product: " . mysqli_error($conn);
        }
    }
?>
