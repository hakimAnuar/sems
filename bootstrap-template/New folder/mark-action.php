<?php 

$conn= new mysqli('localhost','root','','my_demo')or 
die("Could not connect to mysql".mysqli_error($con));

$a = $_REQUEST['t1'];
$b = $_REQUEST['t2'];
$c = $_REQUEST['t3'];
$d = $_REQUEST['t4'];
$e = $_REQUEST['t5'];
$to = $c + $d + $e;
$avg = $to/3;

if($avg > 60){
    $gr = 'A';

} elseif ($avg > 50 && $avg < 59) {
    $gr = 'B';

} elseif ($avg > 40 && $avg < 49) {
    $gr = 'C';

} else {
    $gr = 'FAIL';

}

$in = "insert  into marksheet (name, roll, phy, che, math, total, average, grade) values('$a', '$b', '$c', '$d', '$e', '$to', '$avg', '$gr')";
mysqli_query($conn, $in);
?>