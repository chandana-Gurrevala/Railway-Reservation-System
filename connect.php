<?php
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	//Database connection
	$conn=mysqli_connect('localhost','root','','register');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}
	//mysql_select_db('register') or die("cannot select DB");  
	$query=mysqli_query($conn,"SELECT * FROM info WHERE username='".$username."' AND password='".$password."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
		while($row=mysqli_fetch_assoc($query))  
		{  
			$dbusername=$row['username'];  
			$dbpassword=$row['password'];  
	  
		if($user == $dbusername && $pass == $dbpassword)  
		{  
			header("Location: r.html");
		}else{
			echo '<script type="text/javascript">
			window.onload = function () { alert("Invalid username or password!"); }
			</script>';  
		}  
		}
	} else {  
   // echo "All fields are required!";  
		//echo "Invalid username or password!"; 
		echo '<script type="text/javascript">
			window.onload = function () { alert("Invalid username or password!"); }
			</script>';
	}
} else{
		echo '<script type="text/javascript">
			window.onload = function () { alert("All fields are required!!"); }
			</script>';;
}
	
 
?>
