<?php
    $servername = "localhost";
	$dbname = "buspass";
	$username = "root";
	$password = "";
    $r='243244871730';
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
    echo "connection successfully established <br>";
    $sql="SELECT * FROM `entry` WHERE `UID`='$r'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    echo $num;
    echo " Records found in database";
    echo "<br>";
    if ($num>0){
        $row=mysqli_fetch_assoc($result);
        echo var_dump($row);
        echo "<br>";
        $x=$row["AMOUNT"];
        $y=number_format($x);
        if ($row["AMOUNT"]>15){
            echo "PAYMENT SUCCESSFULL <br>";
            $sql="UPDATE `entry` SET `AMOUNT` = '$y'-'15' WHERE `entry`.`UID` = '$r'";
            $result=mysqli_query($conn,$sql);
            if ($result){
                echo "amount deducted successfully <br>";
            }
        } 
        else{
            echo "PAYMENT UNSUCCESSFULL <br> PLEASE RECHARGE";
        }
        
    }

?>





