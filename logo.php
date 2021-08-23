<?php
session_start();

$sname="localhost";
$dbname="temp";
$pass="";
$usrname="root";

$conn=mysqli_connect($sname,$usrname,$pass,$dbname);

$username=$_POST['us'];
$password=$_POST['pwd'];

$sq="select * from login where username='$username'";

$res=mysqli_query($conn,$sq);
$count=mysqli_num_rows($res);

if($count>0){
	echo "<script>alert('Welcome Admin');window.location='adminh.php'</script>";
}
else{
	echo "You are not Admin";
}





?>