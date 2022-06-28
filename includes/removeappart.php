<?php
require 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM appartement where id=$id";
    mysqli_query($db,$query);
    header('Location:../adminPanel/index.php?manageappart');
}
?>