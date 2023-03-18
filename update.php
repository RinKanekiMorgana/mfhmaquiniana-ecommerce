<html>
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Update Product</h1>
                <form action="update_product.php" method="post">
                    <input type="hidden" name="item_id" value="<?php echo $_GET['item_id']; ?>">
                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="item_price">Item Price</label>
                        <input type="number" class="form-control" id="item_price" name="item_price" value="<?php echo $item_price; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>



