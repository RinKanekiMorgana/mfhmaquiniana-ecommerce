<?php
// add_customer.php

include_once "conn_db.php";

if(isset($_POST['customer_name'])){
    $customer_name=$_POST['customer_name'];
    $customer_email=$_POST['customer_email'];
    $customer_phone=$_POST['customer_phone'];
    $delivery_address=$_POST['delivery_address'];
    
    $table = "customers";
    $fields = array('customer_name' => $customer_name
                   , 'customer_email' => $customer_email
                   , 'customer_phone' => $customer_phone
                   , 'delivery_address' => $delivery_address
                   );
    
    if(insert($conn, $table, $fields) ){
        header("location: customer_list.php?new_record=added");
        exit();
    }  
    else{
        header("location: customer_list.php?new_record=failed");
        exit();
    }
}
?>
