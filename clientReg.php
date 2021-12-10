<?php
include('userfunctions.php');
include('clientRegfunctions.php');

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
            <h1><b>Add/Edit Client Information</b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="clientReg.php">Add Client</a></li>
            <li class="breadcrumb-item"><a href="client.php">Registered Clients</a></li>
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="clientReg.php">Refresh</a></li>
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
                <h3 class="card-title"><strong>Add Client</strong></h3>
                <br>
                <form name="clientReg" onsubmit= "return validateForm();" action="clientReg.php" method="post">

                  
              </div>
                            <!-- form start -->
              <form role="form">
                <div class="card-body">

                     <div class="form-group">
                  <!--<input type="hidden"  name="client_id" value="<?php //echo $client_id; ?>"> -->
                </div> 
                  <div class="row row-space">
                    <div class="col-5">
                    <label for="First Name">First Name</label>
                    <input type="text" id="fname" name="fname" autocomplete="off" value="<?php echo $fname; ?>">
                    
                  </div>
                  <div class="form-group">
                    <div class="col-5">
                    <label for="Last Name">Last Name</label>
                    <input type="text" id="lname" name="lname" autocomplete="off" value="<?php echo $lname; ?>">
                    
                      </div>
                </div>
                </div>
                  
                     <div class="row row-space">

                      <div class="col-5">

                     <div class="input-group">
                        <label for="Gender">Gender</label>
                        <select class="form-group" name="gender" id="gender" >
                        <option value=""></option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                        </select>
                        
                      </div>
                    </div>
                      <div class="form-group">
                       <div class="col-5">
                    <label for="Phone">Phone Number </label>
                    <input type="tel" id="phone" name="phone" maxlength="10" autocomplete="off" value="<?php echo $phone; ?>" >
                    
                  </div>
                </div>
              </div>


                  </div>
 
                <!-- /.card-body -->

                <div class="card-footer">
                   <div class="form-group">
                        <div>
                        
                        <div class="card-footer">
                  <?php if ($update == true){ ?>
                  <button type="submit" name="update" class="btn btn-info">Update</button>
                  <?php }else{ ?>
                    <button type="submit" value = "submit" name="reg_user"  class="btn btn-info">Register</button>
                  <?php } ?>

                  <button type="submit" data-dismiss="modal" class="btn btn-info float-right">Cancel</button>
                </div>

                  </div>
                    </div>
                </div>
              </form>
             
            <!-- /.card -->

            </div>
</div>
  </div>
            <!-- /.card -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
   
    <!-- Jquery JS-->
    <?php
 include('footer.php');
 ?>