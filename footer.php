
  <!-- /.content-wrapper -->
  <footer class="main-footer">

    <strong>Copyright &copy;
     <?php 
//GET CPYRIGHT YEAR DYNAMICALLY USING JAVASCRIPT
     $fromYear = 2020;

   $fromYear = 2020;

   $thisYear = (int)date('Y');

   echo $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');?> 


<a href="#">KNIGHT TECH</a>.</strong>
    All rights reserved.
   
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


</body>
</html>
