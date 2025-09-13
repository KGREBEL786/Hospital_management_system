<?php
@include('nav.php');

$id = $_GET['id'];

$sql = "UPDATE appointment
        SET req_status = 'rejected', app_date = '' 
        WHERE req_id = '$id' ";

if($conn->query($sql)){
    header("Location: Dashboard.php");
}
?>