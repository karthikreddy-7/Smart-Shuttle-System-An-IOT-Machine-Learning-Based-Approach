<?php
$UIDresult=$_POST["UIDresult"];
$r=$UIDresult;
$e="obstacle detected";
date_default_timezone_set('Asia/Kolkata');
$file = fopen("data1.csv","a");
$time=date("H:i:s");
$date=date('d.m.Y');
$data = array($e,$time, $date,$r);
fputcsv($file, $data);
fclose($file);
?>