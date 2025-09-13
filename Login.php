<?php session_start(); ?>

<?php @include("nav.php");?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-4 rounded-4" style="width: 600px;">
    <h3 class="text-center mb-4 text-dark">Login</h3>
    <form method="POST" action="login.php">

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-dark" name="login">Login</button>
      </div>
    </form>
  </div>
</div>

<?php

if(isset($_POST['login'])){
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";

    $sql = "SELECT email, password, role, status FROM users WHERE email = '$email'";
    $res = $conn->query($sql);
    if($res->num_rows>0){
      $row = $res->fetch_assoc();
      if($email==$row['email'] && $password==$row['password']){
        if($row['status'] != "active"){
          echo "You are deacitvated please contact administrator";
          }else{
              $_SESSION['email'] = $row['email'];
              if($row['role']=="admin"){
                  header("Location: Admin/Dashboard.php");
              }elseif($row['role']=="doctor"){
                  header("Location: Doctor/Dashboard.php");
              }elseif($row['role']=="staff"){
                  header("Location: Staff/Dashboard.php");
              }else{
                  header("Location: Patient/Dashboard.php");
              }
            }
      }else{
        echo "incorrect username or password";
      }
    }else{
      echo "incorrect username and password";
    }

  }

?>