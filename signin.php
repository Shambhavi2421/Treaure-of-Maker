<?php

session_start();
@include 'config.php';
mysqli_select_db($conn, 'craft');
$name=$_POST['name'];
$pass=$_POST['pass'];
$s= "select * from persons where name = '$name' && password = '$pass' ";
$result=mysqli_query($conn, $s);
$num=mysqli_num_rows($result);

if($num==1){
    header('location:login.php');
}else{
    header('location:cart.php');
}
?>