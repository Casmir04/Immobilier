
<?php
require('db.php');
if(isset($_POST['addavis'])){
$nom=mysqli_real_escape_string($db,$_POST['nom']);
$prenom=mysqli_real_escape_string($db,$_POST['prenom']);
$telephone=mysqli_real_escape_string($db,$_POST['telephone']);
$num_crn=mysqli_real_escape_string($db,$_POST['num_crn']);
$profession=mysqli_real_escape_string($db,$_POST['profession']);
$adresse=mysqli_real_escape_string($db,$_POST['adresse']);
$avis_clients=mysqli_real_escape_string($db,$_POST['avis_clients']);
$appart_id=$_POST['appart_id'];

$query="INSERT INTO clients (nom,prenom,telephone,num_crn,profession,adresse,avis_clients,appart_id) VALUES ('$nom','$prenom','$telephone','$num_crn','$profession','$adresse','$avis_clients','$appart_id')";
if(mysqli_query($db,$query)){
    header("location:../index.php");
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    ?>
    
    <div class="alert alert-success">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>
    <?php
}else{
    echo "comment is not addedd !";
}

}
?>