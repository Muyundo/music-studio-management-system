<?php
include('userfunctions.php');
include('clientRegfunctions.php');
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
            <li class="breadcrumb-item"><a href="client.php">Search Clients</a></li>
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
                <h3 class="card-title"><strong>Add song</strong></h3>
                <br>
                <form name="clientReg" onsubmit= "return validateSongsForm();" action="songreg.php" method="post">

                   <?php echo display_error(); ?>
              </div>
                            <!-- form start -->
              <form role="form">
                <div class="card-body">

                     <div class="form-group">
                     <!--<label for="id">ID: <?php// echo isset($_SESSION['client_id'])?$_SESSION['client_id'] : "No id"; ?> </label>-->
  <!-- <input name="client_id" type="number" id="id" value="<?php //echo $last_id; ?>"> -->
  <input type="hidden"  name="client_id" value="<?php echo isset($_SESSION['client_id'])?$_SESSION['client_id'] : " ";?>" />
                </div> 
                  

           <div class="row row-space"> 
                     
                      <div class="col-5">
                       
                     <div class="input-group">
                        <label>Song Category</label>
                        <select class="form-group" name="category" id="category" >
                        <option value=""></option>
                        <option value="audio">Audio</option>
                        <option value="video">Video</option>
                        <option value="audio/video">Audio/Video</option>
                        
                        </select>
                        
                      </div>
                    </div>

                    <div class="col-4">
                       
                       <div class="input-group">
                          <label>Song Type</label>
                          <select class="form-group" name="type" id="type" >
                          <option value=""></option>
                          <option value="gospel">Gospel</option>
                          <option value="bongo">bongo</option>
                          <option value="hipop">Hipop</option>
                          <option value="gengeton">Gengeton</option>
                          <option value="traditional">Traditional</option>
                          </select>
                         
                        </div>
                      </div>


                    <div class="form-group">
                    <div class="col-5">
                    <label for="Last Name">Song Title</label>
                    <input type="text" id = "title" name="title"  value="<?php echo $title; ?>">
                    
                      </div>
                </div>
              </div>

              </div>
                  </div>
 
                <!-- /.card-body -->

                <div class="card-footer">
                   <div class="form-group">
                        <div>
                         <?php// if ($update == true){ ?>
                 <!--
                 <button type="submit" name="updateclient" class="btn btn-info">Update</button>
                  <?php// }else{ ?>-->
                    <button type="submit" value ="submit" name="reg_song"  class="btn btn-info">Register</button>
                  <?php //} ?>


                  
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

    <!-- Jquery JS-->
   
    <?php
 include('footer.php');
 ?>