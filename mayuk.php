<?php
    print_r($_POST);
    $conn = mysqli_connect("35.200.170.14","root","sampark@99","login_info");
    if(!$conn){
	echo "helloworld";
    }
    if (!empty($_POST['sub'])) {
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        echo "DONE!";
        if (!empty($name)&&!empty($roll)) {
            $sql = "INSERT INTO `user`(`username`, `password`) VALUES ('$name','$roll')";
            $conn->query($sql);
        }
    }
    else{
        echo "Enter details";
    }
?>
