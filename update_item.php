<?php
include_once "conn_db.php";

if(isset($_POST['update_item'])){
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_description = $_POST['item_description'];
    $item_image = $_POST['item_image'];
    
    $update_query = "UPDATE items SET item_name='$item_name', item_price='$item_price', item_description='$item_description', item_image='$item_image' WHERE item_id='$item_id'";
    
    if(mysqli_query($conn, $update_query)){
        header("Location: display_items.php?update_status=success");
    } else {
        header("Location: display_items.php?update_status=failed");
    }
}
?>
