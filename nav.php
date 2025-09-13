<?php 
$conn = new mysqli("localhost", "root", "", "hospital");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="Home1.php">Hospital</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto">
            <?php 
                if(!isset($_SESSION['email'])){  ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="Home1.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Register.php">Register</a>
                  </li>
                
            <?php }else{
                  $email = $_SESSION['email'];
                  $sql2="SELECT role FROM users WHERE email = '$email' ";
                  $res2=$conn->query($sql2);
                  $row2=$res2->fetch_assoc();
                  if($row2['role']=='admin'){ ?>
                    <li class="nav-item">
                      <a class="nav-link" href="Dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="new_users.php">Add New User</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="view_users.php">View Users</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="view_patients.php">View Patients</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
            <?php }
                  if($row2['role']=='doctor'){ ?>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="dashboard.php">Appointment Requests</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
            <?php }
                  if($row2['role']=='staff'){ ?>
            <?php }
                  if($row2['role']=='patient'){ ?>
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
            <?php }
                } ?>
        </ul>
      </div>
    </div>
  </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
