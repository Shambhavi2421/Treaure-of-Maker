<!-- <?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "craft");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$name = $_REQUEST['name'];
		$email = $_REQUEST['email'];
		$mob = $_REQUEST['mob'];
		$pass = $_REQUEST['pass'];
		$cpass = $_REQUEST['cpass'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO persons VALUES ('$name',
			'$email','$mob','$pass','$cpass')";
		
    if($pass==$cpass)
    {
      echo "correct";
      //header('location:login.php');
    }
    else{
      header('location:login.php');
    }
		// Close connection
		mysqli_close($conn);
		?> -->


<?php

session_start();
@include 'config.php';
mysqli_select_db($conn, 'craft');
$name=$_POST['name'];
$pass=$_POST['pass'];
$s= "select * from persons where name = '$name' ";
$result=mysqli_query($conn, $s);
$num=mysqli_num_rows($result);

if($num==1){
    echo "Username Already Exists";
}else{
    $reg= "insert into persons(name,pass) values ('$name', '$pass')";
    mysqli_query($conn, $reg);
	echo "<script language='javascript'>";
			echo "alert('REGISTRATION SUCCESSFUL')";
			echo "</script>";
			die();
}
?>
