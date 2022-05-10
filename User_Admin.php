<?php
include('userfunctions.php');
include('header.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Administrator and User settings</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="clientReg.php">Add Client</a></li>
            <li class="breadcrumb-item"><a href="client.php">Search Clients</a></li>
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="user_admin.php">Refresh</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><strong>New Admin/User</strong></h3>
                <br>
                <form method="post" action="user_admin.php">

                   <?php echo display_error(); ?>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">

                     <div class="form-group">
                  <input type="hidden"  name="id" value="<?php echo $id; ?>"> 
                </div> 
                  <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" name="fname" autocomplete="off" value="<?php echo $fname; ?>">
                  </div>
                  <div class="form-group">
                    <label for="Last Name">Last Name</label>
                    <input type="text" name="lname" autocomplete="off" value="<?php echo $lname; ?>">
                      </div>
                    <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" name="uname" autocomplete="off" value="<?php echo $uname; ?>">
                  </div>
                  <div class="input-group">
                        <label>User Type</label>
                        <select class="form-group" name="utype" id="utype" >
                        <option value=""><?php echo $utype; ?></option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        </select>
                      </div>
                      <div class="form-group">
                    <label for="Password">password</label>
                    <input type="password" name="pass_1" autocomplete="off" value="<?php echo $uname; ?>">
                  </div>
                  <div class="form-group">
                    <label for="Password">Re-type <br>password</label>
                    <input type="password" name="pass_2" autocomplete="off" value="<?php echo $uname; ?>">
                  </div>
             
                       
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <?php if ($update == true){ ?>
                  <button type="submit" name="update" class="btn btn-info">Update</button>
                  <?php }else{ ?>
                    <button type="submit" name="register_btn"  class="btn btn-info">Register</button>
                  <?php } ?>

                  <button type="submit" data-dismiss="modal" class="btn btn-info float-right">Cancel</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
 <!-- /.card -->

          </div>
          <!-- right column -->
           
            <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-13">
            <!-- general card elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><strong>Registered Admins and Users</strong></h3>
                <br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <?php  include('connect.php');?>
            <?php $results = mysqli_query($conn, "SELECT * FROM users"); ?>
            <table class="table table-striped">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                       
                      <th>Username</th>
                      <th>user Type</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['uname']; ?></td>
            <td><?php echo $row['utype']; ?></td>
             
              
                           <td>
        <a href="user_admin.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><i class="fas fa-pencil-alt">
                              </i></a>
       
        <a href="userfunctions.php?del=<?php echo $row['id']; ?>" class="del_btn"> <i class="fas fa-trash">
                              </i></a>
      </td>
                     </tr>
                     <?php } ?>
                            
                </tbody>
            </table>
              </div>


      </div>
      </div>
      </div>

            </div>
          
        
    
            <!-- /.card -->
              <!-- /.card-body -->
            
            <!-- /.card -->
          
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <?php
 include('footer.php');
 ?>
