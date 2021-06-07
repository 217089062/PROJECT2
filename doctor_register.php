
 <?php


  require("includes/dbconnection.php");

	$error = "";


if (isset($_GET["action"]) && ($_GET["action"] == "login")) {

$user_id = $_POST['username'];
$password = $_POST['pass'];


if (empty($user_id)){

 $error = "Error: No userid entered"; 

}


if (empty($password)) {

 $error = "Error: No password";

  }


if (empty($error)){

$query = "SELECT username, userpass FROM user WHERE username='$user_id' AND userpass='$password'";
$result =  @mysql_query($query) or die('Error, insert query failed');
//if (empty($result)) { $error = "User not found!"; }
$row = mysql_fetch_array ($result, MYSQL_NUM);

}


if (!$row) { 

	$error = "UserID and Password did not match or not found in the database";

	 }


if ($row) { 

		session_register('is');
		$_SESSION['is']['login']    = TRUE;
		$_SESSION['is']['user_id'] = $_POST['user_id'];
	$session = "1";	

require('doctor/doctor_main.php'); exit;

		}
	}

}	


?>


