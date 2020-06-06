<?php
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	//Database connection
	$conn=mysqli_connect('localhost','root','','register');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	} 
	$query=mysqli_query($conn,"SELECT * FROM info WHERE username='".$username."' AND password='".$password."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows==0)  
    {  
		$sql="INSERT INTO info(username,password) VALUES('$username','$password')";  
		$result=mysqli_query($conn,$sql);  
        if($result){  
			echo "Account Successfully Created";
			header("Location: r.html");
		}else{
			echo "Failure!";  
		}  
	} else {  
		//echo "That username already exists! Please try again with another.";
		echo '<script type="text/javascript">
			window.onload = function () { alert("That username already exists! Please try again with another."); }
			</script>';
	}
} else{
		echo '<script type="text/javascript">
			window.onload = function () { alert("All fields are required!!"); }
			</script>';
}
	
 
?>
