<?php
include('userfunctions.php');


include('header.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="index.php">Refresh</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <a href="client.php" class="info-box-icon bg-info elevation-1"><i class="ion ion-person"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Registered Clients</span>
                <span class="info-box-number">
                <?php include ('connect.php');
                 $sql = "select client_id from clients order by client_id ";
                 if ($result = mysqli_query($conn, $sql)){
                  //return number of rows in a result set
                  $rowcount=mysqli_num_rows($result);
                  printf($rowcount);
                  //free result set
                  mysqli_free_result($result);
                 }
                mysqli_close($conn);?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <a href="process.php" class="info-box-icon bg-danger elevation-1"><i class="ionicons ion-ios-musical-notes"></i></a>

              <div class="info-box-content">
                <span class="info-box-text">Registered Songs</span>
                <span class="info-box-number">

                <?php include ('connect.php');
                 $sql = "select song_id from songs order by song_id ";
                 if ($result = mysqli_query($conn, $sql)){
                  //return number of rows in a result set
                  $rowcount=mysqli_num_rows($result);
                  printf($rowcount);
                  //free result set
                  mysqli_free_result($result);
                 }
                mysqli_close($conn);?> </h3>


                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="ionicons ion-ios-musical-notes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Complete Songs</span>
                <span class="info-box-number">
 <?php include ('connect.php');
                 $sql = "select editing from song_status order by editing";
                 if($result = mysqli_query($conn, $sql)){
                  $fieldcount = mysqli_num_fields($result);
                  printf($fieldcount);
                  mysqli_free_result($result);
                 }
                mysqli_close($conn);?>

                 </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-arrow-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Uploaded Songs</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



                   
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 include('footer.php');
 ?>