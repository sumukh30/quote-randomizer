<?php

session_start();

$conn=mysqli_connect('localhost','root','','temp');

$quote=$_POST['qt'];
$author=$_POST['author'];
$unid=$_POST['uid'];

$que1="select * from quotes where number='$unid'";

$res=mysqli_query($conn,$que1);
$ct=mysqli_num_rows($res);

if($ct>0){
	echo "<script>alert('Quote already exists');window.location='adminh.php'</script>";
}
else{
	$que2="insert into quotes(number,qt_name,author) values('$unid','$quote','$author')";
	mysqli_query($conn,$que2);
}
	
if(isset($_POST['submit'])){
	if(getimagesize($_FILES['image']['tmp_name'])==FALSE){
		echo "Please select image";
		}
		else{
			$image=addslashes($_FILES['image']['tmp_name']);
			$name=addslashes($_FILES['image']['name']);
			$image=file_get_contents($image);
			$image=base64_encode($image);
			saveimage($unid,$name,$image);
		}
}
function saveimage($unid,$name,$image){
	$conn=mysqli_connect('localhost','root','');
	mysqli_select_db($conn,"temp");
	$que3="insert into image(num,name,img) values('$unid','$name','$image')";
	$inmgins=mysqli_query($conn,$que3);

	if($inmgins){
		echo "<script>alert('Insertion successful');window.location='adminh.php'</script>";
	}
	else{
		echo "Failed to insert";
	}
}


?>