<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php @include('nav.php'); ?>
    <table class="table table-responsive">
        <tr>
            <th>Patient</th>
            <th>Request Date</th>
            <th>Request Status</th>
            <th>Approve</th>
            <th>Decline</th>
        </tr>
        <?php 
            $sql = "SELECT appointment.req_id, appointment.req_date, appointment.req_status, patient.name, patient.email, patient.dob, patient.address
                FROM appointment
                JOIN patient 
                    ON appointment.req_by = patient.email
                WHERE appointment.req_to = 'doctor123@gmail.com'";
                $res= $conn->query($sql);
            while($row=$res->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['name'] ; ?></td>
                    <td><?php echo $row['req_date'] ;?></td>
                    <td><?php echo $row['req_status'] ;?></td>
                    <td><a href="approve.php?id=<?php echo $row['req_id']; ?>" >Approve</a></td>
                    <td><a href="reject.php?id=<?php echo $row['req_id'] ;?>">reject</a></td>
                </tr>
         <?php  } ?>
    </table>
    <?php 
    ?>
</body>
</html>