<html>
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Update Product</h3>
                <?php
                    include_once "conn_db.php";
                    if(isset($_GET['item_id'])){
                        $item_id = $_GET['item_id'];
                        $product = query($conn, "SELECT * FROM products WHERE item_id='$item_id'")[0];
                    }
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        $item_name = $_POST['item_name'];
                        $item_price = $_POST['item_price'];
                        $item_desc = $_POST['item_desc'];
                        $item_status = $_POST['item_status'];
                        $query = "UPDATE products SET item_name='$item_name', item_price='$item_price', item_desc='$item_desc', item_status='$item_status' WHERE item_id='$item_id'";
                        if($conn->query($query)){
                            header("Location: index.php?update_status=success");
                        } else {
                            header("Location: index.php?update_status=failed");
                        }
                    }
                ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="item_name">Product Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $product['item_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="item_price">Price</label>
                        <input type="number" class="form-control" id="item_price" name="item_price" value="<?php echo $product['item_price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="item_desc">Description</label>
                        <textarea class="form-control" id="item_desc" name="item_desc"><?php echo $product['item_desc'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="item_status">Status</label>
                        <select class="form-control" id="item_status" name="item_status">
                            <option value="A" <?php if($product['item_status']=='A') echo "selected" ?>>Active</option>
                            <option value="I" <?php if($product['item_status']=='I') echo "selected" ?>>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
