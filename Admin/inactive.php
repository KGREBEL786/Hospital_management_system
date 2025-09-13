    <?php include("nav.php"); ?>


<?php
$id = $_GET['id'];

$sql = "UPDATE users 
        SET status = 'deactivate'
        WHERE id = '$id' ";

if($conn->query($sql)){
    header("Location: view_users.php");
}else{
    echo "error";
}

?>