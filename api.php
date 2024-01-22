<?php
$con = new mysqli("localhost", "root", "", "bangladesh");
if (isset($_POST['dat'])) {
    $id = $_POST['dat'];
    $district = $con->query("SELECT * FROM district WHERE division_id=$id")->fetch_all(MYSQLI_ASSOC);
    header("Content-Type: application/json");
    echo json_encode($district);
}
if(isset($_POST['id'])) {
    $id=$_POST['id'];
    $thana=$con->query("SELECT * FROM thana WHERE district_id=$id")->fetch_all(MYSQLI_ASSOC);
    header("Content-Type: application/json");
    echo json_encode($thana);
}
