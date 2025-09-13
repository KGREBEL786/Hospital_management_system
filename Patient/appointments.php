<?php
@include("Nav.php");
?>

<table class="table table-responsive">
    <tr>
        <th>Request Date</th>
        <th>Requested To</th>
        <th>Request Status</th>
    </tr>
    <?php 
        $sql = "SELECT * FROM appointment WHERE req_by = '$session_email'";
        $res = $conn->query($sql);
        while($row=$res->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['req_date']; ?></td>
            <td><?php echo $row['req_to']; ?></td>
            <td><?php echo $row['req_status']; ?></td>
        </tr>
    <?php  } ?>
</table>