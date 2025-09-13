<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php @include("Nav.php");?>
    <?php echo "Welcome " . $session_email; ?>

<div class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-4 rounded-4" style="width: 400px;">
    <h3 class="text-center mb-4 text-primary">Book Appointment</h3>
    <form method="POST">
      
      <div class="mb-3">
        <label for="doctor" class="form-label">Select Doctor</label>
        <select class="form-select" id="doctor" name="doctor" required>
          <option value="">-- Choose Doctor --</option>
          <?php 
            $sql = "SELECT * FROM users WHERE role = 'doctor'";
            $res = $conn->query($sql);
            while($row = $res->fetch_assoc()){
          ?>
          <option value="<?php echo $row['email']; ?>"><?php echo $row['name']; }?></option>
        </select>
      </div>

      <div class="mb-3">
        <label for="time" class="form-label">Select Time</label>
        <input type="datetime-local" class="form-control" id="time" name="time" required>
      </div>

      <div class="d-grid">
        <button type="submit" name="send" class="btn btn-success">Send Appointment Request</button>
      </div>
    </form>
  </div>
<?php 
if(isset($_POST['send'])){
    $req_date = $_POST['time'];
    $doctor = $_POST['doctor'];
    $sql = "INSERT INTO appointment(req_by, req_to, req_date)
            VALUES('$session_email', '$doctor', '$req_date')";
    if($conn->query($sql)){
        echo "<script>alert('request send success');</script>";
    }
}


?>

</body>
</html>