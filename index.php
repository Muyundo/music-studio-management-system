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
                $sql = "select editing from complete_songs order by status_id";
                if ($result = mysqli_query($conn, $sql)){
                  //return number of rows in a result set
                  $rowcount=mysqli_num_rows($result);
                  printf($rowcount);
                  //free result set
                  mysqli_free_result($result);
                }
               mysqli_close($conn);
               ?>

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
                <span class="info-box-number">
                  <?php include ('connect.php');
                 $sql = "select upload from uploaded_songs order by status_id";
                 if ($result = mysqli_query($conn, $sql)){
                  //return number of rows in a result set
                  $rowcount=mysqli_num_rows($result);
                  printf($rowcount);
                  //free result set
                  mysqli_free_result($result);
                 }
                mysqli_close($conn);?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Song Title</th>
                      <th  class="th">Youtube Link</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <script>
        $(".class th").click(function(){
   window.location = "index.php";
 });

    </script>               
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 include('footer.php');
 ?>