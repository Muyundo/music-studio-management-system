<?php
include ('connect.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>STUDIO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- Latest minified bootstrap css -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src = "js/sValidator.js"></script>
<script src = "js/pValidator.js"></script>
<script src = "js/cValidator.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-info navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" bg-success></i></a>
      </li>
      
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
       
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
   <!-- /.navbar -->
<?php
$row = mysqli_query($conn, "select * from nav_tabs  ");
 while ($tab = mysqli_fetch_array($row)) { 
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary  elevation-7">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-info" >
      

      <span class="brand-text font-weight-light bg-info">   <?php echo $tab['nav1'] ;?>
</span>
    </a>
 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-5 pb-5 mb-5 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <div>
                <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['uname']; ?></strong>

                    <small>
                        <i  style="color: #ffffff;">(<?php echo ucfirst($_SESSION['user']['utype']); ?>)</i> 
                        <br>
                        <a href="index.php?logout='1'" style="color: red;">logout</a>
                    </small>

                <?php endif ?>
            </div>
 
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link " active >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              <?php echo $tab['nav2'] ;?>
                 
              </p>
            </a>
             
          </li>
          <!-----------ADMINISTRATOR LINK MOVED DOWN---------------------------------->
          

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p><b>
              <?php echo $tab['nav5'] ;?>
              </b>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="client.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> <?php echo $tab['nav6'] ;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="clientReg.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> <?php echo $tab['nav7'] ;?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> <?php echo $tab['nav8'] ;?></p>
                </a>
              </li>
            </ul>
          </li>
 
 
              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p><b>
              <?php echo $tab['nav9'] ;?>
              </b>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="process.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> <?php echo $tab['nav10'] ;?></p>
                </a>
              </li>
             
            </ul>
            </li>
                     
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p><b>
              <?php echo $tab['nav11'] ;?>
              </b>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="financials.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> <?php echo $tab['nav12'] ;?></p>
                </a>
              </li>
             
            </ul>
            </li>
<!----------------ADMINISTRATOR LINK--------------------->
 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p><b>
              <?php echo $tab['nav3'] ;?>
              </b>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> <?php echo $tab['nav4'] ;?></p>
                </a>
              </li>
             
            </ul>
            </li>

            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php } ?>