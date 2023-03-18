<!-- index.php  @rinmorgana-->
<!DOCTYPE html>
<html>
<head>
	<title>Ordering Module</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Ordering Module</h1>
		<?php
			include_once "conn_db.php";
			
			$product_list = query($conn, "SELECT * FROM products WHERE item_status = 'A'");
			if(count($product_list) > 0) { 
				echo "<hr>";
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<th>Product Name</th>";
                echo "<th>Price</th>";
                echo "<th>Order Qty.</th>";
                echo "</thead>";
                echo "<tbody>";
                
				foreach($product_list as $product){
					echo "<tr>";
					echo "<td>".$product['item_name']."</td>";
					echo "<td>".$product['item_price']."</td>";
					echo "<td>";
					echo "<form action='' method='post'>";
					echo "<input type='hidden' name='item_id' value='".$product['item_id']."'>";
					echo "<div class='form-group'>";
					echo "<input type='number' class='form-control' id='item_qty' name='item_qty' value='1' min='1'>";
					echo "</div>";
					echo "</td>";
					echo "<td>";
					echo "<button type='submit' class='btn btn-success'>Add to cart</button>";
					echo "</form>";
					echo "</td>";
					echo "</tr>";
				}
				echo "</tbody>";
                echo "</table>";
				echo "<a href='checkout.php' class='btn btn-success float-end'>Buy now</a>";
			}
			else {
				echo "<p>No products found.</p>";
			}
		?>
	</div>
</body>
</html>



<!-- checkout.php  @rinmorgana -->
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Checkout</h1>
		<form action="process_checkout.php" method="post">
			<div class="form-group">
				<label for="contact_number">Contact Number</label>
				<input type="text" class="form-control" id="contact_number" name="contact_number" required>
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<textarea class="form-control" id="address" name="address" rows="3" required></textarea>
			</div>
			<div class="form-group">
				<label for="recipient_name">Recipient Name</label>
				<input type="text" class="form-control" id="recipient_name" name="recipient_name" required>
			</div>
			<?php echo "<a href='order_list.php' class='btn btn-success mt-2'>Confirm Order</a>"; ?>
		</form>
	</div>
</body>
</html>

<!-- order_list.php @rinmorgana -->
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
            <!-- Displaying the ordered record list -->
                <h1>Order List Record</h1>
                <?php
                    // Perform the join query 
                    $query = "SELECT u.fullname, u.contact_number, u.address, p.item_name, o.item_qty, o.date_ordered, o.order_status
                        FROM orders o
                        JOIN users u ON u.user_id = o.user_id
                        JOIN products p ON p.item_id = o.item_id
                        WHERE o.order_status = 'P'
                        ORDER BY o.order_id DESC"; // order by order_id in descending order
                
                    $result = mysqli_query($conn, $query);
                
                    // Check if the query was successful 
                    if ($result && mysqli_num_rows($result) > 0) {
                    // Display the order list
                        echo "<table class='table table-bordered'>";
                        echo "<thead>";   
                        echo "<tr>";  
                        echo "<th>User</th>";   
                        echo "<th>Contact Number</th>";
                        echo "<th>Address</th>"; 
                        echo "<th>Product</th>";   
                        echo "<th>Quantity</th>";       
                        echo "<th>Date Ordered</th>";    
                        echo "<th>Order Status</th>";   
                        echo "</tr>";   
                        echo "</thead>";    
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) { 
                            echo "<tr>";    
                            echo "<td>" . $row['fullname'] . "</td>";   
                            echo "<td>" . $row['contact_number'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>"; 
                            echo "<td>" . $row['item_name'] . "</td>";  
                            echo "<td>" . $row['item_qty'] . "</td>"; 
                            echo "<td>" . $row['date_ordered'] . "</td>";
                            echo "<td>" . $row['order_status'] . "</td>";
                            echo "</tr>";
                        }  
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        // If the query was not successful, display an error message 
                        echo "Error retrieving order list from database.";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>
