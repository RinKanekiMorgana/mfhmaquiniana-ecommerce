<?php
include_once "conn_db.php";
if(isset($_GET['order_id'])){
   if(query($conn, "DELETE FROM orders WHERE order_id = ?", $params) ){
       header("location: order_history.php?order_delete=done");
       exit();
   }
   else{
       header("location: order_history.php?order_delete=failed");
       exit();
   } 
}
