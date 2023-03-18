<?php

    //delete_product.php

include_once "conn_db.php";

if(isset($_GET['item_id'])){
    $item_id = $_GET['item_id'];
    $params = array($item_id);
    
    if(query($conn, "DELETE FROM products WHERE item_id = ?", $params) ){
       header("location: product_display.php?product_delete=done");
       exit();
    }
    else{
       header("location: product_display.php?product_delete=failed");
       exit();
    } 
}
?>
