<?php

    // add_product.php

include_once "conn_db.php";

if(isset($_POST['item_name'])){
    $item_name=$_POST['item_name'];
    $item_price=$_POST['item_price'];
    
    $table = "products";
    $fields = array('item_name' => $item_name
                   , 'item_price' => $item_price
                   );
    
    if(insert($conn, $table, $fields) ){
        header("location: product_list.php?new_record=added");
        exit();
    }  
    else{
        header("location: product_list.php?new_record=failed");
        exit();
    }
}
?>
