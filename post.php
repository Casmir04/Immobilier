<?php
require('includes/db.php');
require('includes/function.php');

if(isset($_GET['page'])){
  $page=$_GET['page'];
}else{
  $page=1;
}

$post_per_page=5;
$result=($page-1)*$post_per_page;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700|Raleway:400,700&display=swap"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>immobilier</title>
</head>
<body style="background-color: lightgrey;">
<body style="background-color: lightgray;">
 <?php include_once('includes/navbar2.php') ?>
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-8">
<?php
$appart_id=$_GET['id'];
$postQuery="SELECT * FROM appartement WHERE id=$appart_id";
$runPQ= mysqli_query($db,$postQuery);
$post=mysqli_fetch_assoc($runPQ);
?>

            <div class="card mb-3">
                
                <div class="card-body">
                  <h5 class="card-title"><?=$post['nom_immeuble']?></h5>
                  <span class="badge bg-success "><?=$post['adresse_immeuble']?></span>
                  <span class="badge bg-primary ">posted on <?=date('F jS, Y',strtotime($post['create_at']))?></span>

                  <div class="border-bottom mt-3"></div>
<?php
$post_images=getImagesByPost($db,$post['id']);

?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
<?php
$c=1;
foreach($post_images as $image){
if($c>1){
  $sw = "";
}else{
  $sw = "active";
}

  ?>
<div class="carousel-item <?=$sw?>">
      <img src="images/<?=$image['images']?>" class="d-block w-100" alt="...">
    </div>
  <?php
  $c++;
}
?>
 
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<p class="card-text">Numero de Porte: <?=$post['num_porte']?></p>
<p class="card-text">Numero D'etage: <?=$post['num_etage']?></p>
<p class="card-text">Numero D'appartements:<?=$post['num_appart']?></p>
<p class="card-text">Superficies : <?=$post['superficie']?></p>
<p class="card-text">Nombres de Chambre: <?=$post['nombr_chambre']?></p>
<p class="card-text">Prix: <?=$post['prix']?></p>
 <p class="card-text">Description<?=$post['description']?></p>
                  <div class="addthis_inline_share_toolbox"></div>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Ajouter Au pannier
</button>

                </div>
              </div>


              <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Veillez Reseingner les information Suivant: </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="includes/add_avis.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" id="exampleInputEmail1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="prenom" id="exampleInputEmail1"required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse</label>
    <input type="text" class="form-control" name="adresse" id="exampleInputEmail1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Telephone</label>
    <input type="text" class="form-control" name="telephone" id="exampleInputEmail1"required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Profession</label>
    <input type="text" class="form-control" name="profession" id="exampleInputEmail1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Num CRN</label>
    <input type="text" class="form-control" name="num_crn" id="exampleInputEmail1" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Votre Votre Avie</label>
    <input type="text" class="form-control" name="avis_clients" required>
  </div>

  <input type="hidden" name="appart_id" value="<?=$appart_id?>">
  <button type="submit" name="addavis" onclick="myFunction()" class="btn btn-primary">Envoyer</button>
      

</form>
      </div>
      <script>
function myFunction() {
  alert("Merci!!!!, Un de nos Agent vous contactera");
}
</script>
    </div>
</div>
</div>


</div>
             
    </div>

    <?php include_once('includes/footer.php'); ?>
    </div>
  
    <?php include_once('includes/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60315b469e32d063"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="includes/css/style.css">
  <script src="vendor/jquery/jquery-migrate.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/easing/easing.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/isotope/isotope.pkgd.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
</body>
</html>