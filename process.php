<?php
include('userfunctions.php');
include('header.php');
include('clientRegfunctions.php');

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}


if(isset($_POST['updatesongstatus'])){
  $status_id = $_POST['status_id'];
  // $song_id = $_POST['song_id'];
   $recording = $_POST['recording'];
   $editing = $_POST['editing'];
   $upload = $_POST['upload'];
    $link = $_POST['link'];
   // $status_id =  $_GET['editsongstatus'];

 
 $ss = mysqli_query($conn, "update song_status set recording ='$recording', editing='$editing', upload='$upload', link='$link' where status_id='$status_id' ");


 
  }



?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
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
        <div class="row">
            <div class="col-md-4">

              <div class="card card-info">
              
                <div class="card-header">
                  
                </div>

                  <div class="card-header">
                  <h3 class="card-title"><strong>SELECT SONG ON THE RIGHT TO UPDATE</strong></h3>
                </div>
                <div class="card-body">
                  <?php
                  if(isset($_GET['editsongstatus'])){
                    $status_id = $_GET['editsongstatus'];
                  
                
                  $s = mysqli_query($conn, "select * from song_status where status_id = '$status_id'");
                  while($row = mysqli_fetch_array($s)){
                  ?>
                  <form method="post" action="process.php">
                    <input type="hidden" name="status_id" value= <?php echo $_GET['editsongstatus']; ?>  >
                  <!-- <input type="text" name="song_id" value= <?php// echo $song_id; ?>  >-->

<!---------------------------RECORDING------------------------------------------------->
                   <div class="form-group">
                   
                <label for="Recording">Recording</label> <br>

                <?php if($row['recording']=="pending") { ?>
                <input type="radio" name="recording" value="pending" checked = "true">Pending
                <input type="radio" name="recording" value="active">Active
                <input type="radio" name="recording" value="complete">Complete
                
                <?php } ?>
               
                          
                 <?php if($row['recording']=="active"){?>
                <input type="radio" name="recording" value="pending" >Pending
                <input type="radio" name="recording" value="active" checked = "true">Active
                <input type="radio" name="recording" value="complete">Complete

                <?php } ?>
               

                <?php if($row['recording']=="complete"){?>
                <input type="radio" name="recording" value="pending" >Pending
                <input type="radio" name="recording" value="active"> Active
                <input type="radio" name="recording" value="complete" checked = "true">Complete

                <?php } ?>
                 </div>

                 <!---------------------------EDITING------------------------------------------------->
                  <div class="form-group">
                   
                <label for="Editing">Editing</label> <br>
                <?php if($row['editing']=="pending") { ?>
                <input type="radio" name="editing" value="pending" checked = "true">Pending
                <input type="radio" name="editing" value="active">Active
                <input type="radio" name="editing" value="complete">Complete
                
                <?php } ?>
               
                          
                <?php if($row['editing']=="active"){?>
                <input type="radio" name="editing" value="pending" >Pending
                <input type="radio" name="editing" value="recording" checked = "true">Active
                <input type="radio" name="editing" value="complete">Complete

                <?php } ?>
               

                <?php if($row['editing']=="complete"){?>
                <input type="radio" name="editing" value="pending" >Pending
                <input type="radio" name="editing" value="recording"> Active
                <input type="radio" name="editing" value="complete" checked = "true">Complete

                <?php } ?>
                 </div>

                 <!---------------------------UPLOAD------------------------------------------------->
                  <div class="form-group">
                   
                <label for="Editing">Upload</label> <br>
                <?php if($row['upload']=="pending"){?>
                <input type="radio" name="upload" value="pending" checked="true">Pending
                <input type="radio" name="upload" value="uploaded">Uploaded
                                
                <?php } ?>
               
                          
               <?php if($row['upload']=="uploaded"){?>
                <input type="radio" name="upload" value="pending" >Pending
                <input type="radio" name="upload" value="uploaded"  checked="true">Uploaded
                
                <?php } ?>
                 </div>



                    <div class="form-group">
                      <label for="link">Add link here:</label><br>
                      <input type="text" name="link" autocomplete="off" value =<?php echo $row['link'];?> >
                    </div>
                    <div class="card-footer">
                    <div class="form-group">
                          <div>
                    <button type="submit" name="updatesongstatus" class="btn btn-info">Update</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-info float-right">Cancel</button>
                          </div>
                      </div>
                  </div>
                  </form>
               <?php
            }
          }

              ?>
                  </div>
                  <!-- /.form group -->
               
               </div>
              

                <!-- /.card-body -->
              
              <!-- /.card -->

            
              <!-- /.card -->

            </div>
            <!-- /.col (left) -->
      
          <div class="col-md-8">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Please select song to update status</h3>
              </div>
               
                <div class="card card-body">
                 
              <table class="table table-striped">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>  
                      <th>Title</th>
                      <th>Recording</th>
                       <th>Editing</th>
                       <th>Upload</th>
                       <th>Link</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php
                    include('connect.php');
 $prog = mysqli_query($conn, "select song_status.*, songs.title FROM  song_status INNER JOIN songs ON song_status.song_id = songs.song_id
   ");
                    while($status = mysqli_fetch_array($prog)){
                      // output data of each row
                      
                    //while ($result = mysqli_fetch_array($prog)) {
                     // $result= mysqli_fetch_assoc($prog);
                      ?>
                    <tr>
             
            <td><?php echo $status['title']; ?></td>
            <td><?php echo $status['recording']; ?></td>
            <td><?php echo $status['editing']; ?></td>
            
             
            <td><?php echo $status['upload']; ?></td>
            <td><?php echo $status['link']; ?></td>
            <td>
           <a href="process.php?editsongstatus=<?php echo $status['status_id']; ?>" class="edit_btn" ><i class="fas fa-pencil-alt">
           <a href="process.php?del=<?php echo $status['status_id']; ?>" class="del_btn"><i class="fas fa-trash">
                              </i></a>
                            </td>
                           
                     </tr>
                     
                     <?php
                   //}
                 } 
                 ?>       
                </tbody>
            </table>
           

                 
<!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div><!-- /.card-body -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->



</section>

<!-- /.content -->
<?php
 include('footer.php');
 ?>