<?php
session_start();
$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'temp');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="newstyle.css">
	<header id="heady">
		<h4 style="top: 0px;margin: 2px 0px 5px 30px;padding: 1px;display: block;text-align: center;position: relative;color: white;background-color: deepskyblue;">Quote of day</h4>
	</header>
</head>
<body>

	<div class="sidebar">
		<a href="#heady">Dashboard</a>
		<a href="#view">View-Quotes</a>
		<a href="#addnew">Add-new-quotes</a>
	</div>
	<div class="cont">
		<div class="wrapper">
			<div id="home" class="banner">
				<div class="content">
					<h2 style="top: 30px;font-size: 25px;position: absolute;left: 43%;">Welcome Admin!</h2><br>
					<a href="login1.php" style="position: absolute;left: 95%;font-size: 14px;top: 34px;text-decoration: none;">Logout</a>
					<div id="num">
					<?php
					$sql="select number from quotes";

					$res=mysqli_query($conn,$sql);
					$num=mysqli_num_rows($res);

					echo $num;

					?>
					</div>
					<p>Quotes added</p>
				</div>
			</div>
			<div id="view" class="view-area">
				<div class="content" style="padding-top: 5%;font-size: 18px;">
					<h2 style="font-size: 18px;position:absolute;margin-left: 50%;margin-top: -60px;">Welcome Admin!</h2>
					<a href="#addnew" style="text-decoration: none;color: purple;font-size: 14px;position: relative;margin-left: 87%;margin-top: -55px;">Add new Quote --></a>
					<table border="1" style="text-align: center;position: absolute;margin-left: 32%;margin-top: 60px;font-size: 13px;padding: 1px;">
						<tr>
						<th style="font-size: 15px;padding: 2px;">Number</th>
						<th style="font-size: 15px;">Quote</th>
						<th style="font-size: 15px;">Author</th>
						
						</tr>
						<?php
						$conn=mysqli_connect('localhost','root','');
						mysqli_select_db($conn,'temp');
						$sqlq="select number,qt_name,author from quotes";
						$sqlqq="select img from i.image,q.quotes where i.num=q.number";
						$resu1=mysqli_query($conn,$sqlqq);
						$resu=mysqli_query($conn,$sqlq);
						if(mysqli_num_rows($resu)>0){
							while ($row=mysqli_fetch_array($resu)) {
								echo "<tr><td>".$row["number"]."</td><td>".$row["qt_name"]."</td><td>".$row["author"]."</td></tr>";
								# code...
							}
						}

						?>
					</table>
				</div>
			</div>
			<div id="addnew" class="new-area">
				<div class="content" style="padding-top: 5%;">
					<h2 style="font-size: 18px;position:absolute;margin-left: 50%;margin-top: -60px;">Welcome Admin!</h2>
					<h3 style="font-size: 15px;position: absolute;margin-left: 51%;margin-top: -20px;font-style: italic;background-color: blue;color: white;border-radius: 2px;padding: 2px;">Add new Quote!</h3><br>
					<form action="savee.php" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td style="position: absolute;text-align: center;margin-left: 530px;font-size: 16px;margin-top: 21px;">Quote :</td>
								<td>
									<input type="text" name="qt" required="qt" style="margin-left: 580px;margin-top: 10px;height: 140px;width: 220px;border-radius: 5px;border: 1px solid black;">
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr>
								
							</tr>
							<tr>
								<td style="position: absolute;text-align: center;margin-left: 524px;font-size: 16px;margin-top: 21px;">Image :</td>
								<td>
									<input type="file" name="image" required="image" style="margin-left: 600px;">
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr>
								
							</tr>
							<tr>
								<td style="position: absolute;text-align: center;margin-left: 553px;font-size: 16px;margin-top: 21px;">By: </td>
								<td>
									<input type="text" name="author" required="author" style="margin-left: 590px;border-radius: 5px;border: 1px solid black;height: 20px;width: 230px;">
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr>
								
							</tr>
							<tr>
								<td style="position: absolute;text-align: center;margin-left: 490px;font-size: 16px;margin-top: 21px;">Unique no. : </td>
								<td>
									<input type="number" name="uid" required="uid" style="margin-left: 590px;border-radius: 5px;border: 1px solid black;height: 20px;width: 230px;">
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr>
								
							</tr>
							<tr>
								<td>
									<button type="submit" name="submit" value="Submit" style="margin-left: 50%;position: absolute;margin-top: 30px;width: 110px;height: 30px;padding: 5px;text-align: center;background-color: lightblue;border: none;outline: 2px solid black;cursor: pointer;">Submit</button>
								</td>

							</tr>

						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>