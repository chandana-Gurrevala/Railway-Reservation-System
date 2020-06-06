<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
</style>
</head>
<body>
<div class="card">
  <img src="railway.png" style="width:100%">
</div>
<?php
	if(!empty($_POST['PNR'])){
	$PNR=$_POST['PNR'];
	//Database connection
	$conn=mysqli_connect('localhost','root','','train');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}
	$query=mysqli_query($conn,"SELECT * FROM fam_info WHERE PNR='".$PNR."'");
	$numrows=mysqli_num_rows($query);  
	echo "<center>";
	echo "<h2>";
    if($numrows!=0) 
	{
		//while($row=mysqli_fetch_assoc($query))  
		//{  
			//$dbPNR=$row['PNR'];  
		//if($PNR === $dbPNR)
			$sql = "DELETE FROM fam_info WHERE PNR='".$PNR."'";

	
		if ($conn->query($sql) === TRUE) {
			echo "<br>";
			echo "Cancellation Succesfull!!";
			echo "(Money will be Refunded back to your Account)";
		}else {
			echo "<br>";
			echo "Error deleting record: " . $conn->error;
		}
	
	}else{
		echo "<br>";
		echo "Enter Valid PNR!!";
		}
	}else{
		echo "<br>";
		echo "Enter Valid PNR!!";
	}
	echo"</h2>";
	echo "</center>";
?>
</body>
</html>