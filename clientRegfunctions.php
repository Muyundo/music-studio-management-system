<?php
// connect to the database
require_once "connect.php";

// initializing variables
$fname = "";
$lname = "";
$gender = "";
$phone = "";
$category = "";
$type ="";
$title = "";
$cost = "";
$diposit = "";
$method = "";
$recording="";
$editing="";
$upload="";
$complete="";
$link = "";
$errors = array(); 
$update = false;
global $last_id;
global $last_song_id;
global $client_id;
global $song_id;
global $status_id;

// REGISTER USER
if (isset($_POST['reg_user'])) {
   client();
}

function client(){
  global $conn, $errors, $fname, $fnameErr, $lname, $lnameErr, $gender, $genderErr, $phone, $phoneErr; 

  // receive all input values from the form
   $fname =mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn,  $_POST['lname']);
   $gender = mysqli_real_escape_string($conn,  $_POST['gender']);
   $phone = mysqli_real_escape_string( $conn, $_POST['phone']);
    
  // check if user exist using phone number
 
  $client_check_query = "SELECT * FROM clients WHERE phone='$phone' LIMIT 1";
  $result = mysqli_query($conn, $client_check_query);
  $client = mysqli_fetch_assoc($result);
  
  if ($client) { // if user exists
    if ($client['phone'] === $phone) {
      array_push($errors, "Client already exists ");
    }  
  }
   // Finally, register user if there are no errors in the form
   
    if (count($errors) == 0) {
    $query = "insert into clients (fname, lname, gender,   phone)
          VALUES('$fname', '$lname', '$gender',  '$phone')";
    if(mysqli_query($conn, $query)){
      //last inserted id
      $last_id = mysqli_insert_id($conn) ;
    $_SESSION["client_id"] = $last_id;
   /* $query = mysqli_query($conn, "select client_id  from clients");
     $row = mysqli_fetch_assoc($query);*/
  
    }
  // $_SESSION['success']  = "New user successfully created!!";
  
  header('location: songreg.php');  
   
  }
}



/*-------------------------------------------------------------------------------------------------------------*/
//REGISTER SONG
/*--------------------------------------------------------------------------------------------------------------*/

if (isset($_POST['reg_song'])) {

  song();
}

function song(){
  global $conn, $errors, $client_id, $category, $categoryErr, $type, $typeErr, $title, $titleErr;
//$client_id = $_SESSION['last_id'];*/
        $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
        $category= mysqli_real_escape_string($conn, $_POST['category']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
            
 //check for duplicate
  $song_check_query = "SELECT * FROM songs WHERE title='$title' LIMIT 1";
  $result = mysqli_query($conn, $song_check_query);
  $song = mysqli_fetch_assoc($result);
  
  if ($song) { 
    if ($song['title'] === $title) {
      array_push($errors, "Song already exists ");
    }  
  }
   //register song if there are no errors in the form
   
    if (count($errors) == 0) {
    $query = "insert into songs (client_id, category, type, title)
          VALUES('$client_id', '$category', '$type', '$title')";
    
    if(mysqli_query($conn, $query)){
      //last inserted id
      $last_song_id = mysqli_insert_id($conn) ;
    $_SESSION["song_id"] = $last_song_id;
  
  
    }
       header('location: payments.php');
  }

}
/*-------------------------------------------------------------------------------------------------------------*/
//REGISTER payments
/*--------------------------------------------------------------------------------------------------------------*/

if (isset($_POST['reg_payment'])) {

  payment();
}

function payment(){
  global $conn, $errors, $client_id, $cost, $diposit, $balance, $method;
//$client_id = $_SESSION['last_id'];*/
        $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
        $cost= mysqli_real_escape_string($conn, $_POST['cost']);
        $diposit = mysqli_real_escape_string($conn, $_POST['diposit']);
        $method = mysqli_real_escape_string($conn, $_POST['method']);
        //$balance = $cost - $diposit;
  
   //register payment if there are no errors in the form
   
    if (count($errors) == 0) {
    $query = "insert into payments (client_id,  cost, diposit, method)
          VALUES('$client_id', '$cost', '$diposit', '$method')";
    mysqli_query($conn, $query);
 
     header('location: client.php');
    }
  }


 //delete button
if (isset($_GET['del'])) {
  $client_id = $_GET['del'];
  global $category;
     $query =  "DELETE FROM clients WHERE client_id = $client_id";
     mysqli_query($conn, $query);
   
header('location: client.php');
}


if (isset($_GET['profile'])) {

 $client_id = $_GET['profile'];

$query = mysqli_query($conn, "select fname, lname, gender, phone  from clients where client_id='$client_id' ");
     
       $prof = mysqli_fetch_assoc($query);
 
       //display payments from payments table
 $query = mysqli_query($conn, "select cost, diposit, balance from payments where client_id =' $client_id'");
       $payments = mysqli_fetch_assoc($query);
 
 //display song category of specific clients
     $query = mysqli_query($conn, "select type  from songs where client_id = '$client_id'");
      $profcategory = mysqli_fetch_assoc($query);
 
         //query number of songs per client
        $query = mysqli_query($conn, "select client_id from songs where client_id = '$client_id' order by client_id ");
              $rowcount=mysqli_num_rows($query); //return number of rows in a result set    
                 mysqli_free_result($query); //free result set
 
    
   $query = mysqli_query($conn, "select balance from payments where client_id = '$client_id'");
     $balance = mysqli_fetch_assoc($query);
  
      //display songs of specific clients
    // $result = mysqli_query($conn, "select title, category from songs where client_id = '$client_id'   ");

     $status = mysqli_query($conn, "select recording, editing, upload, link from song_status 
     where client_id = '$client_id' ");
     $stt=mysqli_fetch_assoc($status);
    
     
   



 }


 




