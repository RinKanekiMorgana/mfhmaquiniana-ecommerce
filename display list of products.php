<html>
<?php include_once "conn_db.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>List of Products</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>List of Products</h3>
                <?php
                    $product_list = query($conn, "SELECT item_id, item_name, item_price FROM products WHERE item_status='A'");
                    echo "<hr>";
                    if(isset($_GET['update_status'])){
                        switch($_GET['update_status']){
                            case "success": echo "<div class='alert alert-success'>Product Updated.</div>";
                                  break;
                            case "failed":  echo "<div class='alert alert-danger'>Product Failed to be updated.</div>";
                                  break;
                        }
                    }
                    echo "<hr>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<th>Product Name</th>"; 
                    echo "<th>Price</th>";
                    echo "<th>Action</th>";
        echo "<th>Action</th>";
                    echo "</thead>";
                    foreach($product_list as $key => $row){
                        echo "<tr>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['item_price'] . "</td>";
                        echo "<td> <a class='btn btn-success' href='update_product.php?item_id=". $row['item_id'] ."'> Update </a> </td>";
                        echo "<td> <a class='btn btn-danger' href='delete_product.php?item_id=". $row['item_id'] ."'> Delete </a> </td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>
