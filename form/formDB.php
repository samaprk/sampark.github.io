<?php
    print_r($_POST);
print_r($_SESSION['username']);
session_start();
    
	$conn = mysqli_connect("35.200.170.14","root","sampark@99","login_info");
		if(!$conn){
	        echo "<script>alert('bijli ka bill tera baap bharega')</script>";
	    }
	    if (!empty($_POST['submit'])) {
	        $un = $_POST['username'];
	        $pw = $_POST['password'];
	        echo "DONE!";
	        if (!empty($un)&&!empty($pw)) {
	            $sql = "INSERT INTO `user`(`username`, `password`) VALUES ('$un','$pw')";
	            if($conn->query($sql)){
	            	$_SESSION['username'] = $_POST['username'];
	            	header("Location: ../dashboard.php");
	            }
	            else{
	            	echo "redirection not possible";
	            }
	        }
	    }
	    else{
	        echo "Enter details";
	    }
    
?>
