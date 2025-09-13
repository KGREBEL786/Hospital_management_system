    <?php include("nav.php"); ?>


<div class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow-lg p-4 rounded-4" style="width: 500px;">
    <h3 class="text-center mb-4 text-primary">Register</h3>
    <form method="POST">
      
      <div class="mb-3">
        <label for="role" class="form-label">Type</label>
        <select class="form-select" id="role" name="role" required>
          <option value="" disabled selected>-- Select Type --</option>
          <option value="doctor">Doctor</option>
          <option value="staff">Staff</option>
          <option value="patient">Patient</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>

      <div class="mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" required>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" rows="3" placeholder="Enter your password" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success" name="register">Register</button>
      </div>
    </form>
  </div>

  <?php
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO patient(name, email, dob, address) 
            VALUES('$name', '$email', '$dob', '$address')";
    $sql2 = "INSERT INTO users(name, email, password, role)
            VALUES('$name', '$email', '$password', '$role')";
    if($role == 'patient'){
        if($conn->query($sql) && $conn->query($sql2)){
        echo "<script>alert('Registration Success for patient');</script>";
    }
    }else{
        if($conn->query($sql2)){
                    echo "<script>alert('Registration Success for users');</script>";
        }
    }
}

?>