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
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

<!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main CSS File -->
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>immobilier</title>
</head>
<body style="background-color: lightgrey;">
    <?php include_once('includes/navbar.php');?><br><br>

 <div class="site-section site-portfolio" style="padding-bottom: 0px;">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
            <h2>Chez Nous, C'est le confort</h2>
          </div>
        </div>
        <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">

        <?php
$postQuery="SELECT * FROM immeuble";
if(isset($_GET['search'])){
  $keyword = $_GET['search'];
  $postQuery="SELECT * FROM appartement WHERE prix LIKE '%$keyword%' ORDER BY id DESC LIMIT $result,
  $post_per_page";
}else{
  $postQuery="SELECT * FROM appartement ORDER BY id DESC LIMIT $result,$post_per_page";

}
























































































































































































$runPQ= mysqli_query($db,$postQuery);
while($post=mysqli_fetch_assoc($runPQ)){
 ?>
 <a href="post.php?id=<?=$post['id']?>" style="text-decoration: none;color:black;">
     <div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
            <div class="item-wrap fancybox">
              <div class="work-info">
              <h3>Nom Immeuble: <?=$post['nom_immeuble']?> </h3>
                <h3>Adresse :<?=$post['adresse_immeuble']?> </h3>
 </div>
              <img class="img-fluid" src="images/<?=getPostThumb($db,$post['id'])?>">
   
</div><br>
</a>
      
</div>



 <?php
 
}
?>  
        </div>
  
    </div>
    </div>


        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                  
                <?php
$sql = "SELECT * FROM membre";
$result = $db->query($sql);
?>
<?php 
if($result->num_rows > 0){
    ?>
    <?php while ($row = $result->fetch_assoc()){
        ?>
 <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                            <img src="images/<?php echo $row['image']?> "alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name"><?php echo $row['nom']?> <?php echo $row['prenom']?></h2>
                            <p class="description"><?php echo $row['info']?></p>

                            <button class="button">Members</button>
                        </div>
                    </div>
        <?php
    } ?>
    <?php
}else{
    echo "0 Membre";
}
?>
                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
<?php
if(isset($_GET['search'])){
  $keyword=$_GET['search'];
  $q="SELECT * FROM appartement WHERE prix LIKE '%$keyword%'";

}else{
  $q="SELECT * FROM appartement";

}
$r=mysqli_query($db,$q);
$total_posts=mysqli_num_rows($r);
$total_pages=ceil($total_posts/$post_per_page);

?>
   <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

        <?php
        if($page>1){
          $switch="";
        }else{
          $switch="disabled";
        }

        if($page<$total_pages){
          $nswitch="";
        }else{
          $nswitch="disabled";
        }
        ?>


          <li class="page-item <?=$switch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php
          for($opage=1;$opage<=$total_pages;$opage++){
           ?>
               <li class="page-item"><a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$opage?>"><?=$opage?></a></li>


           <?php 
          }
          ?>
          <li class="page-item <?=$nswitch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page+1?>">Next</a>
          </li>
        </ul>
      </nav> 


<style>
      body {
    font-family: "Inconsolata", monosapce;
    color: #0d1e2d;
}

.item {
    border: none;
    margin-bottom: 30px;
}

.item .item-wrap {
    display: block;
    position: relative;
    overflow: hidden;
}

.item .item-wrap:after {
    z-index: 2;
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    visibility: hidden;
    opacity: 0;
    transition: .3s all ease-in-out;
}

.item .item-wrap img {
    transition: .3s transform ease;
    -webkit-transform: scale(1);
    transform: scale(1);
}

.item .item-wrap>.work-info {
    position: absolute;
    top: 50%;
    width: 100%;
    text-align: center;
    z-index: 3;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    color: #fff;
    opacity: 0;
    visibility: hidden;
    margin-top: 20px;
    transition: .3s all ease;
}

.item .item-wrap>.work-info h3 {
    font-size: 20px;
    margin-bottom: 0;
}

.item .item-wrap>.work-info span {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: .2rem;
}

.item .item-wrap:hover {
    text-decoration: none;
}

.item .item-wrap:hover img {
    -webkit-transform: scale(1.05);
    transform: scale(1.05);
}

.item .item-wrap:hover:after {
    opacity: 1;
    visibility: visible;
}

.item .item-wrap:hover .work-info {
    margin-top: 0px;
    opacity: 1;
    visibility: visible;
}

/* Google Fonts - Poppins */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}


/* .body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #EFEFEF;
} */

.slide-container {
    max-width: 1120px;
    width: 100%;
    padding: 40px 0;
}

.slide-content {
    margin: 0 40px;
    overflow: hidden;
    border-radius: 25px;
}

.card {
    border-radius: 25px;
    background-color: #FFF;
}

.image-content,
.card-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 14px;
}

.image-content {
    position: relative;
    row-gap: 5px;
    padding: 25px 0;
}

.overlay {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: #4070F4;
    border-radius: 25px 25px 0 25px;
}

.overlay::before,
.overlay::after {
    content: '';
    position: absolute;
    right: 0;
    bottom: -40px;
    height: 40px;
    width: 40px;
    background-color: #4070F4;
}

.overlay::after {
    border-radius: 0 25px 0 0;
    background-color: #FFF;
}

.card-image {
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 50%;
    background: #FFF;
    padding: 3px;
}

.card-image .card-img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #4070F4;
}

.name {
    font-size: 18px;
    font-weight: 500;
    color: #333;
}

.description {
    font-size: 14px;
    color: #707070;
    text-align: center;
}

.button {
    border: none;
    font-size: 16px;
    color: #FFF;
    padding: 8px 16px;
    background-color: #4070F4;
    border-radius: 6px;
    margin: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.button:hover {
    background: #265DF2;
}

.swiper-navBtn {
    color: #6E93f7;
    transition: color 0.3s ease;
}

.swiper-navBtn:hover {
    color: #4070F4;
}

.swiper-navBtn::before,
.swiper-navBtn::after {
    font-size: 35px;
}

.swiper-button-next {
    right: 0;
}

.swiper-button-prev {
    left: 0;
}

.swiper-pagination-bullet {
    background-color: #6E93f7;
    opacity: 1;
}

.swiper-pagination-bullet-active {
    background-color: #4070F4;
}

@media screen and (max-width: 768px) {
    .slide-content {
        margin: 0 10px;
    }
    .swiper-navBtn {
        display: none;
    }
}
    </style>
    <?php include_once('includes/footer.php')?>
       <!-- Swiper JS -->
       <script src="js/swiper-bundle.min.js"></script>

<!-- JavaScript -->
<script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
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