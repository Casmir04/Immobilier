<?php
require 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM clients where id=$id";
    mysqli_query($db,$query);
    header('Location:../adminPanel/index.php?manageclient');
}
?>