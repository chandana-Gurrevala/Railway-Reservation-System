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
	if(!empty($_POST['trainname'])&&!empty($_POST['jdate'])&&!empty($_POST['clss'])&&!empty($_POST['nos'])&&!empty($_POST['from'])&&!empty($_POST['to'])&&!empty($_POST['boarding'])&&!empty($_POST['res_upto'])){
		$trainname=$_POST['trainname'];
		$jdate=$_POST['jdate'];
		$clss=$_POST['clss'];
		$nos=$_POST['nos'];
		$from=$_POST['from'];
		$to=$_POST['to'];
		$boarding=$_POST['boarding'];
		$res_upto=$_POST['res_upto'];
		$PNR=rand();
		if(!empty($_POST['name1']) && !empty($_POST['sex1']) && !empty($_POST['age1'])){
			$name1=$_POST['name1'];
			$sex1=$_POST['sex1'];
			$age1=$_POST['age1'];
			$con1=$_POST['con1'];
			$choice1=$_POST['choice1'];
			$conn=new mysqli('localhost','root','','train');
			if($conn->connect_error){
			die('Connection Failed : '.$conn->connect_error);
			}else{
			$stmt = $conn->prepare("insert into reserve(PNR, trainname, jdate, clss, nos, from_t, to_t, boarding, res_upto)
			values(?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssissss",$PNR, $trainname, $jdate, $clss, $nos, $from, $to, $boarding, $res_upto);
			$stmt->execute();
			$stmt = $conn->prepare("insert into fam_info(PNR, Fname, Sex, Age, cons, choice)
			values(?,?,?,?,?,?)");
			$stmt->bind_param("sssiss",$PNR, $name1, $sex1, $age1, $con1, $choice1);
			$stmt->execute();
			}
			if(!empty($_POST['name2'])&&!empty($_POST['sex2'])&&!empty($_POST['age2'])){
				$name2=$_POST['name2'];
				$sex2=$_POST['sex2'];
				$age2=$_POST['age2'];
				$con2=$_POST['con2'];
				$choice2=$_POST['choice2'];
				$stmt = $conn->prepare("insert into fam_info(PNR, Fname, Sex, Age, cons, choice)
				values(?,?,?,?,?,?)");
				$stmt->bind_param("sssiss",$PNR, $name2, $sex2, $age2, $con2, $choice2);
				$stmt->execute();
				if(!empty($_POST['name3'])&&!empty($_POST['sex3'])&&!empty($_POST['age3'])){
					$name3=$_POST['name3'];
					$sex3=$_POST['sex3'];
					$age3=$_POST['age3'];
					$con3=$_POST['con3'];
					$choice3=$_POST['choice3'];
					$stmt = $conn->prepare("insert into fam_info(PNR, Fname, Sex, Age, cons, choice)
					values(?,?,?,?,?,?)");
					$stmt->bind_param("sssiss",$PNR, $name3, $sex3, $age3, $con3, $choice3);
					$stmt->execute();
					if(!empty($_POST['name4'])&&!empty($_POST['sex4'])&&!empty($_POST['age4'])){
						$name4=$_POST['name4'];
						$sex4=$_POST['sex4'];
						$age4=$_POST['age4'];
						$con4=$_POST['con4'];
						$choice4=$_POST['choice4'];
						$stmt = $conn->prepare("insert into fam_info(PNR, Fname, Sex, Age, cons, choice)
						values(?,?,?,?,?,?)");
						$stmt->bind_param("sssiss",$PNR, $name4, $sex4, $age4, $con4, $choice4);
						$stmt->execute();
						if(!empty($_POST['name5'])&&!empty($_POST['sex5'])&&!empty($_POST['age5'])){
							$name5=$_POST['name5'];
							$sex5=$_POST['sex5'];
							$age5=$_POST['age5'];
							$con5=$_POST['con5'];
							$choice5=$_POST['choice5'];
							$stmt = $conn->prepare("insert into fam_info(PNR, Fname, Sex, Age, cons, choice)
							values(?,?,?,?,?,?)");
							$stmt->bind_param("sssiss",$PNR, $name5, $sex5, $age5, $con5, $choice5);
							$stmt->execute();
						}
					}
				}
			}

			//echo "<img src="railway.png">";
			echo "<body style=background-color:grey'>";
			echo "<center>";
			echo "<br>";
			echo "<h1>Reservation Successful!!</h1>";
			echo "<h2>PNR:$PNR</h2>";
			echo "<h3>Train Name & No.:$trainname</h3>";
			echo "<h3>Date of Journey:$jdate</h3>";
			echo "<h3>Class:$clss</h3>";
			echo "<h3>From:$from</h3>";
			echo "<h3>To:$to</h3>";
			//echo "<br>";
			$query=mysqli_query($conn,"SELECT * FROM fam_info WHERE PNR='".$PNR."'");
			$numrows=mysqli_num_rows($query);
			while($row=mysqli_fetch_assoc($query))  
			{
					echo "<h3>";
					echo "Name:";
					echo $row['Fname'];echo "&nbsp";echo "&nbsp";
					echo " Sex:";
					echo $row['sex'];echo "&nbsp";echo "&nbsp";
					echo "Age:";
					echo $row['Age'];
					echo "</h3>";
			}
			echo "<center>";
			//header("LOCATION:result.html");
		}else{
			echo '<script type="text/javascript">
			window.onload = function () { alert("All fields are required!!"); }
			</script>';
		}
	}
	else{
		echo '<script type="text/javascript">
			window.onload = function () { alert("All fields are required!!"); }
			</script>';
	}
	
?>

</body>
</html>