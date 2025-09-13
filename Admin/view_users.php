    <?php include("nav.php"); ?>


<table class="table table-responsive">
    <tr>
        <th>name</th>
        <th>email</th>
        <th> 
            <form method="POST">
                role
                <select name="role">
                    <option value="">--SELECT TYPE --</option>
                    <option value="doctor">Doctor</option>
                    <option value="staff">staff</option>
                    <option value="patient">patient</option>
                </select>
                <input type="submit" name="show">
            </form>
        </th>
        <th>status</th>
        <th>Action</th>
    </tr>
    <?php
        if(isset($_POST['show'])){
            $role = $_POST['role'];
            $sql = "SELECT * FROM users WHERE role = '$role'";
        }else{
            $sql = "SELECT * FROM users WHERE role != 'admin'";
        }
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['role'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                    <a class="text-decoration-none" href="active.php?id=<?php echo $row['id'];?>">Activate / 
                    <a class="text-decoration-none" href="inactive.php?id=<?php echo $row['id'];?>">Deactivate
                </td>
      <?php  } ?>
</table>