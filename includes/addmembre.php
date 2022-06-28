<?php
require 'db.php';
if(isset($_POST['addmembre'])){
    $nom=mysqli_real_escape_string($db,$_POST['nom']);
    $prenom=mysqli_real_escape_string($db,$_POST['prenom']);
    $info=mysqli_real_escape_string($db,$_POST['info']);
    $image = "image-".uniqid().".jpg";
    $photoUrlToSave = "../images/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$photoUrlToSave);
    $query="INSERT INTO membre(nom,prenom,image,info) VALUES('$nom','$prenom','$photoUrlToSave','$info')";
    mysqli_query($db,$query);
    header('Location:../adminPanel/index.php?managemembre');
}

?>