<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("Location: ../Login.php");
}
$session_email = $_SESSION['email'];
@include("../conn.php"); 


?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="Dashboard.php">Hospital</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="Dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="appointments.php">View Appointment Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
