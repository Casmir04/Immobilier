<?php
require('../includes/db.php');
require('../includes/function.php');
if(!isset($_SESSION['isUserLoggedIn'])){
  header('Location:login.php'); 
}
$admin=getAdminInfo($db,$_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SOCIM ADMIN PANEL</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SOCIM Admin Panel </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
 



        </li><!-- End Notification Nav -->


        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <?php
            
            ?>
            
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$admin['full_name']?></span>
    
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Account</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
  

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../includes/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Add Appart</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?manageclient">
          <i class="bi bi-menu-button-wide"></i><span>Manage Clients </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Components Nav -->

  

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?manageappart">
          <i class="bi bi-layout-text-window-reverse"></i><span>Manage Appart</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?managemembre">
          <i class="bi bi-bar-chart"></i><span>Manage Membre</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
      </li><!-- End Charts Nav -->

  

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <?php
          if(isset($_GET['manageappart'])){
            ?>
<div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">appartements 
            </h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>N° Porte</th>
                    <th>N° Etage</th>
                    <th>N° Appart</th>
                    <th>Superficie</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $posts = getAllPost($db);
                $count=1;
                foreach($posts as $post){
                  ?>
  <tr>
                     <th><?=$count?></th>
                    <td><?=$post['num_porte']?></td>
                    <td><?=$post['num_etage']?></td>
                    <td><?=$post['num_appart']?></td>
                    <td><?=$post['superficie']?></td>
                    
                    <td>
                      <div class="btn-group">
                         <a class="btn btn-danger" href="../includes/removeappart.php?id=<?=$post['id']?>">Remove<i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php
                  $count++;
                }
                ?>
                
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
 </div>
 <div class="col-lg-12">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">appartements 
  </h5>

    <!-- Default Table -->
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th> Nombre Chambre</th>
          <th>prix</th>
          <th>decription</th>
          <th>Immeuble</th>
          <th>Addresse</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $posts = getAllPost($db);
      $count=1;
      foreach($posts as $post){
        ?>
<tr>
           <th><?=$count?></th>
          <td><?=$post['nombr_chambre']?></td>
          <td><?=$post['prix']?></td>
          <td><?=$post['description']?></td>
          <td><?=$post['nom_immeuble']?></td>
          <td><?=$post['adresse_immeuble']?></td>
          <td><?=date('F jS, Y',strtotime($post['create_at']))?></td>
          <td>
            <div class="btn-group">
               <a class="btn btn-danger" href="../includes/removeappart.php?id=<?=$post['id']?>">Remove<i class="icon_close_alt2"></i></a>
            </div>
          </td>
        </tr>
        <?php
        $count++;
      }
      ?>
      
      </tbody>
    </table>
    <!-- End Default Table Example -->
  </div>
</div>
</div>
      </div>

<?php
          }else if(isset($_GET['managemembre'])){
?>
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add New Membre</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="../includes/addmembre.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="Enter name" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" placeholder="Enter lastname" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Poste</label>
    <input type="text" name="info" class="form-control" id="exampleInputEmail1" placeholder="Enter Poste" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Photo de Profil</label>
    <input type="file" name="image" class="form-control" id="exampleInputEmail1" placeholder="photo" required>
  </div>
  <div class="modal-footer">
                      <button type="submit" name="addmembre" class="btn btn-primary">Ajouter</button>
                    </div>
</form>                    
</div>
                   
                  </div>
                </div>
              </div>
<div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Membre- 
              <a href="#myModal" data-bs-toggle="modal" class="text-primary">Ajouter Nouveau Membre</a>
            </h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>info</th>
                    <th>images</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $menus = getMembre($db);
                $count=1;
                foreach($menus as $menu){
                  ?>
  <tr>
                     <th><?=$count?></th>
                    <td><?=$menu['nom']?></td>
                    <td><?=$menu['prenom']?></td>
                    <td><?=$menu['info']?></td>
                    <td><img src="<?php echo $menu["image"];?>" height="50px";></td>
                    <td>
                      <div class="btn-group">
                         <a class="btn btn-danger" href="../includes/removemembre.php?id=<?=$menu['id']?>">Remove<i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php
                  $count++;
                }
                ?>
                
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
 </div>
      </div>


<?php
          }else if(isset($_GET['manageclient'])){
?>

<div class="row">

        <div class="col-lg-12">

<div class="card">
  <div class="card-body">

    <!-- Default Table -->
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Telephone</th>
          <th>Profession</th>
          <th>Num CRN</th>
          <th>Adresse</th>
          <th>avis Du Clients</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $menus = getclients($db);
      $count=1;
      foreach($menus as $menu){
        ?>
<tr>
           <th><?=$count?></th>
          <td><?=$menu['nom']?></td>
          <td><?=$menu['prenom']?></td>
          <td><?=$menu['telephone']?></td>
          <td><?=$menu['profession']?></td>
          <td><?=$menu['num_crn']?></td>
          <td><?=$menu['adresse']?></td>
          <td><?=$menu['avis_clients']?></td>
          <td>
            <div class="btn-group">
               <a class="btn btn-danger" href="../includes/removeclients.php?id=<?=$menu['id']?>">Remove<i class="icon_close_alt2"></i></a>
            </div>
          </td>
        </tr>
        <?php
        $count++;
      }
      ?>
      
      </tbody>
    </table>
    <!-- End Default Table Example -->
  </div>
</div>
      </div>
<?php
          }else{
            ?>
    <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add appart</h5>

                            <div class="panel-body">
                              <div class="form">
                                <form action="../includes/addappart.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="row mb-3">
                                  
                                  <div class="row">
      <div class=" form-group col-sm-6">
      <label>Nom Immeuble</label>
                  <input type="text" name="nom_immeuble" class="form-control" required>
                  </div>
                  <div class=" form-group col-sm-6">
                  <label>Adresse</label>
                  <input type="text" class="form-control" name="adresse_immeuble"/>
                  </div>
                  <div class=" form-group col-sm-6">
                  <label>nombre de chambres</label>
                  <input type="text" name="nombr_chambre" class="form-control" required>
                  </div>
                  <div class=" form-group col-sm-6">
                  <label>Superficie</label>
                  <input type="text" class="form-control" name="superficie">
                  </div>
                  <div class=" form-group col-sm-6">
                  <label>Mumero de Porte</label>
                  <input type="text" name="num_porte" class="form-control" required>
                  </div>
                  <div class=" form-group col-sm-6">
                  <label>Numero d'etage</label>
                  <input type="text" class="form-control" name="num_etage"/>
                  </div>
      </div> 
                </div>
                <label>Description</label><br>
                <div class="card">
      
                       
                            <!-- TinyMCE Editor -->
                            <textarea class="tinymce-editor" name="description" required>
                
              </textarea>
                            <!-- End TinyMCE Editor -->

                    </div>
                    <div class="row mb-3">
      <div class="row">
      <div class=" form-group col-sm-6">
                  <label>Prix</label>
                  <input type="text" name="prix" class="form-control" required>
                  </div>
                  <div class=" form-group col-sm-6">
                  <label>Upload Photos(Max 5)</label>
                  <input type="file" class="form-control" name="post_image[]" accept="image/*" multiple required/>
                  </div>
      </div>            

                </div>
                <input type="submit" name="addappart" class="btn btn-primary" value="Add Appart">
                                </form>
                              </div>
                            </div>

                        </div>
                    </div>
            </div>


            <?php
          }
          ?>
            <!-- Top Selling -->
<!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       <!-- End Recent Activity -->

          <!-- Budget Report -->
   <!-- End Budget Report -->

          <!-- Website Traffic -->
<!-- End Website Traffic -->

          <!-- News & Updates Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SOCIM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by Caslew-Company</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>