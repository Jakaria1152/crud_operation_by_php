<?php


include "connection.php";
if(isset($_GET['id']))
{
    
    $id = $_GET['id'];
   
    $query = "DELETE FROM students where SL_ID = $id";
    mysqli_query($conn, $query);
}
header('location:/crud_operation/index.php');
exit;
?>