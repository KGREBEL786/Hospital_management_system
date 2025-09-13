    <?php include("nav.php"); ?>


<?php
$id = $_GET['id'];

$sql = "UPDATE users 
        SET status = 'active'
        WHERE id = '$id' ";

if($conn->query($sql)){
    header("Location: view_users.php");
}else{
    echo "error";
}

?>