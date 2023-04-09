<?php
$UIDresult=$_POST["UIDresult"];
date_default_timezone_set('Asia/Kolkata');
$file = fopen("data.csv","a");
$time=date("H:i:s");
$date=date('d.m.Y');
$status = 0;
$servername = "localhost";
$dbname = "buspass";
$username = "root";
$password = "";
$r=$_POST["UIDresult"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
$sql="SELECT * FROM `entry` WHERE `UID`=$r";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
//echo $num;
if ($num>0){
    $x=$row["AMOUNT"];
    $name=$row["NAME"];
    $y=number_format($x);
    if ($row["AMOUNT"]>15){
        $status = 1;
        echo $row["NAME"];
        $sql="UPDATE `entry` SET `AMOUNT` = '$y'-'15' WHERE `UID` = $r";
        $result=mysqli_query($conn,$sql);
        if ($result){
            echo "success";
            echo $row["AMOUNT"]-'15';
        }
    } 
    else{
        echo $row["NAME"];
        echo " FAIL ";
        echo $row["AMOUNT"];
    }
    $data = array($r,$name, $time, $date,$status);
    fputcsv($file, $data);
    fclose($file);
    //echo $x;
}
?>