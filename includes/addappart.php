<?php
require('db.php');
if(isset($_POST['addappart'])){
    $num_porte=mysqli_real_escape_string($db,$_POST['num_porte']);
    $num_etage=mysqli_real_escape_string($db,$_POST['num_etage']);
    $num_appart=mysqli_real_escape_string($db,$_POST['num_appart']);
    $superficie=mysqli_real_escape_string($db,$_POST['superficie']);
    $nombr_chambre=mysqli_real_escape_string($db,$_POST['nombr_chambre']);
    $prix=mysqli_real_escape_string($db,$_POST['prix']);
    $description=mysqli_real_escape_string($db,$_POST['description']);
    $nom_immeuble=mysqli_real_escape_string($db,$_POST['nom_immeuble']);
    $adresse_immeuble=mysqli_real_escape_string($db,$_POST['adresse_immeuble']);
    $query="INSERT INTO appartement (num_porte,num_etage,num_appart,superficie,nombr_chambre,prix,description,nom_immeuble,adresse_immeuble) VALUES('$num_porte','$num_etage','$num_appart','$superficie','$nombr_chambre','$prix','$description','$nom_immeuble','$adresse_immeuble')";
    $run=mysqli_query($db,$query);
    $appart_id=mysqli_insert_id($db);
    $image_name=$_FILES['post_image']['name'];
    $img_tmp=$_FILES['post_image']['tmp_name'];
    foreach($image_name as $index=>$img){
        if(move_uploaded_file($img_tmp[$index],"../images/$img")){
            $query="INSERT INTO images (appart_id,images) VALUES($appart_id,'$img')";
            $run=mysqli_query($db,$query);
        }
    }
header('Location:../adminPanel/index.php?manegeappart');

}
?>