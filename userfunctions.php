<?php 
session_start();

// connect to database
require_once "connect.php";

// variable declaration
$id = 0;
$uname = "";
$fname = "";
$lname = "";
$utype = "";
$update = false;
$errors = array(); 
//innitialize nav tab variables
$nav1 = "";
$nav2 = "";
$nav3 = "";
$nav4 = "";
$nav5 = "";
$nav6 = "";
$nav7 = "";
$nav8 = "";
$nav9 = "";
$nav10= "";
$nav11= "";
$nav12= "";


// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	users();
}

// REGISTER USER
function users(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $fname, $lname, $uname;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$uname    =  e($_POST['uname']);
	$fname  = e($_POST['fname']);
	$lname  = e($_POST['lname']);
	$pass_1  =  e($_POST['pass_1']);
	$pass_2  =  e($_POST['pass_2']);

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) { 
		array_push($errors, "First name is required"); 
	}
	if (empty($lname)) { 
		array_push($errors, "Last name is required"); 
	}
	if (empty($uname)) { 
		array_push($errors, "Username is required"); 
	}
	 
	if (empty($pass_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($pass_1 != $pass_2) {
		array_push($errors, "The two passwords do not match");
	}


	$users_check_query = "SELECT * FROM users WHERE uname='$uname' LIMIT 1";
  $result = mysqli_query($conn, $users_check_query);
  $users = mysqli_fetch_assoc($result);
  
    // if user exists
  if($users){
    if ($users['uname'] === $uname)   {
      array_push($errors, "User already exists.");
    }
}

     

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$pass = md5($pass_1);//encrypt the password before saving in the database

		if (isset($_POST['utype'])) {
			$utype = e($_POST['utype']);
			$query = "INSERT INTO users (fname, lname, uname,  utype, pass) 
					  VALUES('$fname', '$lname', '$uname', '$utype', '$pass')";
			mysqli_query($conn, $query);
			
			header('location: User_Admin.php');
		}else{
			$query = "INSERT INTO users (fname, lname, uname, utype, pass) 
					  VALUES('$fname', '$lname', '$uname',  '$utype', '$pass')";
			mysqli_query($conn, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: User_Admin.php');				
		}
	}
}

//update button
if (isset($_POST['update'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$pass_1  = $_POST['pass_1'];
	$pass_2  = $_POST['pass_2'];

	if (empty($fname)) { 
		array_push($errors, "First name is required"); 
	}
	if (empty($lname)) { 
		array_push($errors, "Last name is required"); 
	}
	if (empty($uname)) { 
		array_push($errors, "Username is required"); 
	}
	 
	if (empty($pass_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($pass_1 != $pass_2) {
		array_push($errors, "The two passwords do not match");
	}

	$users_check_query = "SELECT * FROM users WHERE uname='$uname' LIMIT 1";
  $result = mysqli_query($conn, $users_check_query);
  $users = mysqli_fetch_assoc($result);
  

	 if($users){
    if ($users['uname'] === $uname)   {
      array_push($errors, "User already exists.");
    }

   }
	if (count($errors) == 0) {
		$pass = md5($pass_1);

	mysqli_query($conn, "update users set fname='$fname', lname='$lname', uname='$uname' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: User_Admin.php');
}
}

//delete button
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	//mysqli_query($conn, "delete from users WHERE id=$id");
     $query = "delete  from users where id = $id";
     mysqli_query($conn, $query);
	 
header('location: User_Admin.php');
}




// return user array from their id
function getUserById($id){
	global $conn;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $conn;
	return mysqli_real_escape_string($conn, trim($val));
}
//error display

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}


function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
//log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	userlogin();
}

// LOGIN USER
function userlogin(){
	global $conn, $uname, $errors;

	// grap form values
	$uname = e($_POST['uname']);
	$pass = e($_POST['pass']);

	// make sure form is filled properly
	if (empty($uname)) {
		array_push($errors, "Username is required");
	}
	if (empty($pass)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$pass = md5($pass);

		$query = "select * from users WHERE uname='$uname' AND pass='$pass' LIMIT 1";
		$results = mysqli_query($conn, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['utype'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination. Try again");
		}
	}
}

 if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "select * from users where id=$id");


if (mysqli_num_rows($record) > 0) {
  // output data of each row
  while($users = mysqli_fetch_assoc($record)){

   /* if (count($record) == 1 ) {
      $users = mysqli_fetch_array($record);*/
     
      $fname = $users['fname'];
      $lname = $users['lname'];
      $uname = $users['uname'];
	  $utype= $users['utype'];
      
      
      

       
    }
  }
}