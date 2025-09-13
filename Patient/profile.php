<?php @include('Nav.php') ?>
<?php 

$sql = "SELECT * FROM patient WHERE email = '$session_email'";
$res=$conn->query($sql);
$row=$res->fetch_assoc();

?>
<div class="container py-5">
  <div class="card shadow-lg p-4 rounded-4">
    <h3 class="text-center text-primary mb-4">My Profile</h3>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-control" name="email" value="<?php echo $session_email ?>" disable>
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea class="form-control" name="address" rows="3"><?php echo $row['address']; ?></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" value="<?php echo $row['dob']; ?>">
      </div>

      
      <div class="mb-3">
        <label class="form-label">Current Password</label>
        <input type="password" class="form-control" name="current_password" placeholder="Enter current password">
      </div>

      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm new password">
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success" name="update">Update Profile</button>
      </div>
    </form>
  </div>
</div>

<?php   

    if(isset($_POST['update'])){
        $sql2 = "SELECT * FROM users WHERE email =  '$session_email'";
        $res2=$conn->query($sql2);
        $row2=$res2->fetch_assoc();

        $new_name = $_POST['name'] ?? "";
        $new_email = $_POST['email'] ?? "";
        $new_dob = $_POST['dob'] ?? "";
        $new_address = $_POST['address'] ?? "";
        $new_password = $_POST['new_password'] ?? "";
        $confirm_password = $_POST ['confirm_password'] ?? "";
        $current_password = $_POST ['current_password'] ?? "";
         
        $sql3 = "UPDATE patient
                SET name = '$new_name', email = '$new_email', dob = '$new_dob', address = '$new_address' 
                WHERE email = '$session_email' ";
        $sql4 = "UPDATE users
                SET password = '$new_password'
                WHERE email = '$session_email' ";
        if(empty($new_name)){
            echo "Name cannot be empty";
        }elseif(empty($new_email)){
            echo "email cannot be empty";
        }elseif(empty($new_dob)){
            echo "dob cannot be empty";
        }elseif(empty($new_address)){
            echo "address cannot be empty";
        }elseif($new_password != $confirm_password){
            echo "password and confirm not match";
        }else{  if($conn->query($sql3)){
                echo "<script>alert('update success');</script>";
                $_SESSION['email'] = $new_email;
                if($current_password == $row2['password']){
                $conn->query($sql4);
                echo "<script>alert('password change success');</script>";}
            }
        }
    
    }  
?>