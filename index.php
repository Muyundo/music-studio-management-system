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
            <li class="breadcrumb-item"><a href="clientReg.php">Add Client</a></li>
            <li class="breadcrumb-item"><a href="client.php">Registered Clients</a></li>
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
        <div class="col-3">
           
           <!-- /.card-header -->
           <div class="card-body table-responsive p-0" style="height: 300px;">
          
             <table class="table table-head-fixed" id = "Uploaded" >
             <input type="text" id="table_search" onkeyup="myFunction()" class="form-control float-right" placeholder="Search">
               <thead>
                 <tr>
                   <th>Songs in Production</th>
                   

                   </tr>
               </thead>
               <tbody>

               <?php 
            include('connect.php');
           $uploaded = mysqli_query($conn, "select * from uploaded ");
           while ( $up = mysqli_fetch_array($uploaded)){
           
           ?>
                 <tr>
                   <td><?php echo $up['title']; ?></td>
                   
                   </tr>
                   <?php } ?>
               </tbody>
             </table>
            
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->

          <div class="col-3">
           
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
             
                <table class="table table-head-fixed" id = "Uploaded" >
                <input type="text" id="table_search" onkeyup="myFunction()" class="form-control float-right" placeholder="Search">
                  <thead>
                    <tr>
                      <th>Uploaded Songs</th>
                      

                      </tr>
                  </thead>
                  <tbody>

                  <?php 
               include('connect.php');
              $uploaded = mysqli_query($conn, "select * from uploaded ");
              while ( $up = mysqli_fetch_array($uploaded)){
              
              ?>
                    <tr>
                      <td><a href="<?php echo $up['link']; ?>"><?php echo $up['title']; ?></a></td>
                      
                      </tr>
                      <?php } ?>
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
       function myFunction(){
//initialize variables
var input, filter, table, tr, td, i, textValue;
input = document.getElementById("table_search");
filter = input.value.toUpperCase();
table = document.getElementById("Uploaded");
tr = table.getElementByTagName("tr");
//loop through table rows and hide those that don't match the search query
for(i = 0; i<tr.length; i++){
td = tr[i].getElementByTagName("td")[0];
if(td){
  textValue = td.textContent || td.innerText;
  if(textValue.toUpperCase().indexOf(filter)> -1){
    tr[i].style.display = "";
  }else{
    tr[i].style.display = "No matching results";
  }
}

}


       }

    </script>               
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
 include('footer.php');
 ?>