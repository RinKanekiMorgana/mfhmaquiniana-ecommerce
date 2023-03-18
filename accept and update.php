<?php

    // update_product.php

include_once "conn_db.php";

if(isset($_POST['item_id'])){
    $table = "products";
    
    $p_item_id  = $_POST['item_id'];
    $p_item_name  = $_POST['item_name'];
    $p_item_price = $_POST['item_price'];

    $fields = array( 'item_name' => $p_item_name
                    , 'item_price' => $p_item_price
                   );
    $filter = array( 'item_id' => $p_item_id );
    
   
   if( update($conn, $table, $fields, $filter )){
       header("location: product_display.php?update_status=success");
       exit();
   }
    else{
        header("location: product_display.php?update_status=failed");
        exit();
    }
}
else{
    $item_id = $_GET['item_id'];
    $product = query($conn, "SELECT item_name, item_price FROM products WHERE item_id=$item_id AND item_status='A'");

    if(count($product) == 0){
        header("location: product_display.php");
        exit();
    }

    $item_name = $product[0]['item_name'];
    $item_price = $product[0]['item_price'];
}
?>


