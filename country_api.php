<?php
$con=new mysqli("localhost","root","","bangladesh");
if(isset($_GET['divid'])){
$division=$con->query("SELECT * from division where country_id=".$_GET['divid'])->fetch_all(MYSQLI_ASSOC);
header('Content-type:application/json');
echo json_encode($division);
}
if(isset($_GET['disid'])){
$district=$con->query("SELECT * from district where division_id=".$_GET['disid'])->fetch_all(MYSQLI_ASSOC);
header('Content-type:application/json');
echo json_encode($district);
}
if(isset($_GET['thaid'])){
$thana=$con->query("SELECT * from thana where district_id=".$_GET['thaid'])->fetch_all(MYSQLI_ASSOC);
header('Content-type:application/json');
echo json_encode($thana);
}
if(isset($_GET['unid'])){
$union=$con->query("SELECT * from unions where thana_id=".$_GET['unid'])->fetch_all(MYSQLI_ASSOC);
header('Content-type:application/json');
echo json_encode($union);
}
if(isset($_GET['vilid'])){
$village=$con->query("SELECT * from village where unions_id=".$_GET['vilid'])->fetch_all(MYSQLI_ASSOC);
header('Content-type:application/json');
echo json_encode($village);
}

 ?>