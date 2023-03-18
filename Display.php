<html>
<?php include_once "db_conn.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>Order History</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Order History</h3>
                <?php

                    $customer_id = $_SESSION['customer_id'];
                    
                    $order_list = query($conn, "SELECT order_id, order_date, order_total FROM orders WHERE customer_id=$customer_id");

                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<th>Order ID</th>";
                    echo "<th>Date</th>";
                    echo "<th>Total</th>";
                    echo "</thead>";
                    foreach($order_list as $key => $row){
                        echo "<tr>";
                        echo "<td>" . $row['order_id'] . "</td>";
                        echo "<td>" . $row['order_date'] . "</td>";
                        echo "<td>" . $row['order_total'] . "</td>";
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
