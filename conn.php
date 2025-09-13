<?php
$conn = new mysqli("localhost", "root", "", "hospital");

if(!$conn){
    echo error_log();
}

?>