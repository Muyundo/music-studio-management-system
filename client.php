<?php
include('userfunctions.php');

if (!isLoggedIn()) {
   
  header('location: login.php');
}

 
 include('header.php'); 

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client Entry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="clientReg.php">Add Client</a></li>
            <li class="breadcrumb-item"><a href="client.php">Registered Clients</a></li>
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="client.php">Refresh</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><strong>Search Clients</strong></h3>
              </div>
              <!-- /.card-header -->
               <div class="col-md-30">
              <div class="card-body">
                <?php  include('connect.php');?>
            <?php $results = mysqli_query($conn, "SELECT * FROM clients "); ?>
                <table id="example1" class="table table-bordered table-striped" >
                  <a href="clientReg.php" class="btn btn-info  active  " role="button" aria-pressed="true">Add New Client</a>


                  <thead>

                  <tr>
                   
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Date Registered</th>

          
                    <th>Action</th>
                     
                  </tr>
                  </thead>
                  <tbody>
                   <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['date_reg']; ?></td>
            
             <td>
         
<a href="profile.php?profile=<?php echo $row['client_id']; ?>" class="view_btn"><i class="fas fa-eye">More</i></a>

<a href="clientReg.php?edit=<?php echo $row['client_id']; ?>"    class="edit_btn" ><i class="fas fa-pencil-alt">Edit</i></a>

<a href="clientRegfunctions.php?del=<?php echo $row['client_id']; ?>" class="del_btn"><i class="fas fa-trash">Delete</i></a>
      </td>
              
                     </tr>
                     <?php } ?>
                            
                    
                  </tbody>
                   
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <?php
 include('footer.php');
 ?>
 