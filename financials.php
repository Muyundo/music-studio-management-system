<?php

include('userfunctions.php');
include('clientRegfunctions.php');

include('header.php');
?>
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Financials</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check-alt"></i></span>
            <?php  
            $sum = mysqli_query($conn,"select sum(cost) , sum(diposit), sum(balance) from payments" );
          $cost = mysqli_fetch_array($sum);
     ?>
              <div class="info-box-content">
                <span class="info-box-text">Total Income <small>(Debts included)</small></span>
                <span class="info-box-number">Ksh.
                <?php echo $cost['sum(cost)'];

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
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-donate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Paid</span>
                <span class="info-box-number">Ksh.
                <?php 
                echo $cost['sum(diposit)'];

                ?></span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-donate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Arrears</span>
                <span class="info-box-number">
                Ksh.
                <?php echo $cost['sum(balance)'];

                ?>  

                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <?php  
            $method = mysqli_query($conn,"select sum(diposit)from cash_payments" );
          $cash = mysqli_fetch_array($method);
     ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-donate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total paid in cash</span>
                <span class="info-box-number"> 
                  <?php echo $cash['sum(diposit)']; 
                  ?>
               
              
              </span>
              </div>
          
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-donate"></i></span>
              <?php  
               $method1 = mysqli_query($conn,"select sum(diposit)from mpesa_payments" );
                   $mpesa = mysqli_fetch_array($method1);
     ?>
              <div class="info-box-content">
                <span class="info-box-text">Paid via M-PESA</span>
                <span class="info-box-number">
                  
                <?php echo $mpesa['sum(diposit)']; 
                  ?>

                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
</div>
        <!-- /.row -->
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><strong>Full Clients Payment report (<small>Search Client name to View Related Specific Payments</small>)</strong></h3>
              </div>
              <!-- /.card-header -->
               <div class="col-md-30">
              <div class="card-body">
                <?php  include('connect.php');?>
            <?php $results = mysqli_query($conn, "SELECT * FROM client_payments_report "); ?>
                <table id="example1" class="table table-bordered table-striped" >
                 

                  <thead>

                  <tr>
                   
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Cost</th>
                    <th>Diposit</th>
                    <th>Balance</th>
                    <th>Payment Method</th>
                    <th>Payment Date</th>

          
                                       
                  </tr>
                  </thead>
                  <tbody>
                   <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['cost']; ?></td>
            <td><?php echo $row['diposit']; ?></td>
            <td><?php echo $row['balance']; ?></td>
            <td><?php echo $row['method']; ?></td>
            <td><?php echo $row['date_diposited']; ?></td>
            
            <!-- <td>
         
<a href="profile.php?profile=<?php //echo $row['client_id']; ?>" class="view_btn"><i class="fas fa-eye">More</i></a>

<a href="clientReg.php?edit=<?php //echo $row['client_id']; ?>"    class="edit_btn" ><i class="fas fa-pencil-alt">Edit</i></a>

<a href="clientRegfunctions.php?del=<?php //echo $row['client_id']; ?>" class="del_btn"><i class="fas fa-trash">Delete</i></a>
      </td>
              
                     </tr>-->
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
    
      <!-- /.container-fluid -->
               
       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
 include('footer.php');
 ?>