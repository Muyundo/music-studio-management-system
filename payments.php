<?php
include('userfunctions.php');
include('clientRegfunctions.php');
include('header.php');
if (!isLoggedIn()) {
   
  header('location: login.php');
}

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
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="payments.php">Refresh</a></li>
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
                <form name="clientReg" onsubmit= "return validatePaymentsForm();" action="payments.php" method="post">

                   <?php echo display_error(); ?>
              </div>
                            <!-- form start -->
              <form role="form">
                <div class="card-body">

                     <div class="form-group">
                   <input type="hidden"  name="client_id" value="<?php echo isset($_SESSION['client_id'])?$_SESSION['client_id'] : " ";?>" />
                </div> 
                <div class="form-group">
                   <input type="hidden"  name="song_id" value="<?php echo isset($_SESSION['song_id'])?$_SESSION['song_id'] : " ";?>" />
                </div> 


               <div class="row row-space">
                    <div class="col-5">
                    <label for="Production Cost">Production Cost</label>
                    <input type="number" id="cost" name="cost"  value="<?php echo $cost; ?>">
                  </div>
                  <div class="form-group">
                    <div class="col-5">
                    <label for="Diposit">Diposit</label>
                    <input type="number" id="diposit" name="diposit" value="<?php echo $diposit; ?>">
                      </div>
                </div>
              </div>
                  </div>



 <div class="col-4">
                       
                       <div class="input-group">
                          <label>Payment Mode</label>
                          <select class="form-group" name="method" id="method" >
                          <option value="">select</option>
                          <option value="cash">Cash</option>
                          <option value="mpesa">Mpesa</option>
                          </select>
                         
                        </div>
                      </div>



 
                <!-- /.card-body -->

                <div class="card-footer">
                   <div class="form-group">
                        <div>
                         <?php if ($update == true){ ?>
                  <button type="submit" name="updateclient" class="btn btn-info">Update</button>
                  <?php }else{ ?>
                    <button type="submit" value="submit" name="reg_payment"  class="btn btn-info">Register</button>
                  <?php } ?>
                           <button type="submit" data-dismiss="modal" class="btn btn-info float-right">Cancel</button>
                        </div>
                    </div>
                </div>
              </form>
             
            <!-- /.card -->
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
   
           
          <!-- right column -->

          <?php
 include('footer.php');
 ?>