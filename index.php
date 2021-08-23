<?php
$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,"temp");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Quote of the day</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="qtpage.css">

</head>
<body>
	<div id="container">
		<div id="inner">
			<h1 style="text-align: center;color: dodgerblue;font-style: italic;background-color: yellow;margin-left: 30%;margin-right: 340px;">Quote of the day</h1>
			<h3 style="text-align: center;color: white;font-style: italic;">Daily wisdom brought to you by Forbes.</h3>
			<div id="cont" style="position: absolute;margin-left: 36%;margin-top: 100px;font-size: 18px;">
				<?php
				$sql="select q.qt_name,i.img,q.author from quotes q,image i where q.number=i.num order by rand() limit 1";
				$res=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($res);
				if($count>0){
					while($row=mysqli_fetch_array($res)){
						echo " ".$row["qt_name"].'<br><br><br><img height="70" width="70" border-radius="2" src="data:img;base64,'.$row[1].'"><br>By-&nbsp;  '.$row["author"].'';
					}
				}

				?>
			</div>
		</div>
	</div>

</body>
</html>