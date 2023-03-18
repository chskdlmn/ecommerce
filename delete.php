<?php
include_once "db_conn.php";

if(isset($_GET['item_id'])){
    
    $table = "products";
    $d_product_id = $_GET['item_id'];
    $fields = array( 'item_status' => 'deleted' );
    $filter = array( 'item_id' => $d_item_id );
    
   if( update($conn, $table, $fields, $filter )){
       header("location: index.php?item_status=deleted");
       exit();
   }
    else{
        header("location: index.php?item_status=failed");
        exit();
    }
}
?>
