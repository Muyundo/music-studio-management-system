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
            <h1><strong>Client Profile</strong></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><button><a href="index.php">Home</a></button></li>
              <li class="breadcrumb-item active"><button><a href="client.php">Clients</a></button></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->

            <?php
                 require_once ('clientRegfunctions.php');
                 ?>
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src=" dist\img\user4-128x128.webp"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
               <br><strong>
                 
 
          <?php  $profile = mysqli_query($conn, "select fname, lname, gender, phone from clients where
           client_id=$client_id  ");
           $prof = mysqli_fetch_assoc($profile);

           $sum = mysqli_query($conn,"select sum(cost) , sum(diposit), sum(balance) from payments where client_id = '$client_id'" );
     $cost = mysqli_fetch_array($sum);
 //while ($prof = mysqli_fetch_assoc($profile)) { ?>

<?php
               echo $prof['fname']. " "  .$prof['lname']; //$x['fname'];  
               ?>
             
                </strong></h3>
                <?php //}?>
                <p class="text-muted text-center"><b><?php echo $profcategory['type'];?> artist
                  
                   </b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right"><?php echo $prof['gender'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right"><?php echo $prof['phone'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Number of Songs</b> <a class="float-right"> <?php echo $rowcount ;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Total Billed</b> <a class="float-right">Ksh.<?php echo $cost['sum(cost)'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Total Paid</b> <a class="float-right">Ksh.<?php echo $cost['sum(diposit)'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Balance</b> <a class="float-right">Ksh.<?php echo $cost['sum(balance)'];?></a>
                  </li>
                  
                  </li>
                </ul>
               
                
              </div>
              
            </div>
            <?php}?> 
            
            
            <div class="card card-primary">
               
               
              
               
            </div>
             
          </div>
         
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#songDetails" data-toggle="tab">Songs Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#processedSongs" data-toggle="tab">Complete Song(s)</a></li>
                <?php $_SESSION['client_id']=$client_id; ?>

                  <li class="nav-item"><a class="nav-link" href="songreg.php">AddSong</a></li>
                  <li class="nav-item"><a class="nav-link" href="payments.php">Add Payment</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="songDetails">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                         <div class="card">
              <div class="card-header">
                <h3 class="card-title"><strong>Song Description and Progress</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                    
                      <th >Song Title</th>
                      <th>Category</th>
                      <th>Recording</th>
                      <th>Editing</th>
                      <th>Upload</th>
                      <th>link</th>
                       
                    </tr>
                  </thead>
                  <tbody>
                    <!--select client song tittles and paste in each row-->
                    <?php 
                    include('connect.php');
$s = mysqli_query($conn, "select  title, category FROM   songs  where client_id = '$client_id'");

                     while ($song = mysqli_fetch_assoc($s)) {
                        if(mysqli_num_rows($s)>0){?>


                    <tr>
                      
                      <td>
                     <?php echo $song['title'];?>
                    </td>
                    <td>
                     <?php echo $song['category'];?>
                    </td>
                    <?php
                   }
                      }
                      ?>
                      
                        
                      
                     <td><?php echo $stt['recording'];?></td>
                     <td><?php echo $stt['editing'];?></td>
                     <td><?php echo $stt['upload'];?></td>
                     <td><?php echo $stt['link'];?>  
                     </td>
                     <?php
                     
                   
                     ?>
                     </tr>
                    
                   
                   
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
               
            </div> 
                      </div>
                       
                    </div>
                  
                       
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="processedSongs">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <p><strong>Page under construction!!</strong></p>
                       
                      
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <!--PAYMENT DETAILS TAB-->

                  <div class="tab-pane" id="payments">
                   <p><strong>Page under construction!!</strong></p>
                  </div>

                   <div class="tab-pane" id="newSong">
                    <form class="form-horizontal">
                       
                             <!-- form start -->

<form role="form">
<?php 
//mysqli_query($conn, $query);
//header('location: client.php');

//require_once('clientRegfunctions.php');
 $record = mysqli_query($conn, "select client_id, category, type from songs where 
 client_id='$client_id'");
while($add = mysqli_fetch_array($record=1)){
?>
<form method="post" action="clientRegfunctions.php"  >
<div class="card-body">
<div class="form-group">
<input type="text"  name="client_id" value="<?php echo $add['client_id'];?>" />
</div>  
<div class="form-group">
<input type="text"  name="category" value="<?php echo $add['category'];?>" />
</div>   
<div class="form-group">
<input type="text"  name="type" value="<?php echo $add['type'];?>" />
</div>          
<div class="form-group">
<div class="col-5">
<label for="Last Name">Song Title</label>
<input type="text" name="title"  autofocus value="<?php echo $title; ?>">
</div>

</div>
 
 <!-- /.card-body -->

<div class="card-footer">
<div class="form-group">
<div>   
<button type="submit" name="addsong"  class="btn btn-primary">Add</button>
                   
<button type="submit" data-dismiss="modal" class="btn btn-primary float-right">Cancel</button>
                        </div>
                    </div>
                    </div>
              
               
              </form>
                 <?php
                }
                ?>    
               
                  </div>

                 
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
      </div><!-- /.container-fluid -->
    
    </section>
 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
 include('footer.php');
 ?>