<?php
    $hn = "35.200.170.14";
    $un = "root";
    $pw = "sampark@99";
    $db = "login_info";
    $username = "auddy";
    $conn = new mysqli($hn,$un,$pw,$db);
    if(!$conn){
        echo "Error!";
    }

    $sql = "select * from user where username = 'auddy'";
    $result = $conn->query($sql);

    $rows = $result->num_rows;

    echo $rows;
    echo "<br>";

    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo "UserName" . $row['username'] . "<br>";
    echo "Password" . $row['password'] . "<br>";

    $result->close();
    $conn->close();
?>