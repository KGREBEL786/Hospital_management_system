    <?php include("nav.php"); ?>

<?php 
$start = 0;
$rows_per_page = 4;

$records  = $conn->query("SELECT * FROM patient");
$nr_of_rows = $records->num_rows;

$pages = ceil($nr_of_rows/$rows_per_page);

if(isset($_GET['page-nr'])){
    $page = $_GET['page-nr']-1;
    $start = $page * $rows_per_page;
}

$res = $conn->query("SELECT * FROM patient LIMIT $start, $rows_per_page");
?>

<table class="table table-responsive table-striped">
    <?php while($row = $res->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
        </tr>
    <?php } ?>
</table>

<div class="page-info mb-3">
    <?php if(!isset($_GET['page-nr'])){ $page = 1; } else { $page=$_GET['page-nr']; } ?>
    Showing <?php echo $page ?> of <?php echo $pages; ?> pages
</div>

<div class="d-flex justify-content-center">
    <nav>
        <ul class="pagination">

            <li class="page-item">
                <a class="page-link" href="?page-nr=1">First</a>
            </li>

            <?php if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){ ?>
                <li class="page-item">
                    <a class="page-link" href="?page-nr=<?php echo $_GET['page-nr']-1; ?>">Previous</a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
            <?php } ?>

            <?php 
                for($counter = 1; $counter <= $pages; $counter++){ 
                    if(isset($_GET['page-nr']) && $_GET['page-nr'] == $counter){
                        echo "<li class='page-item active'><a class='page-link' href='?page-nr=$counter'>$counter</a></li>";
                    } elseif(!isset($_GET['page-nr']) && $counter == 1){
                        echo "<li class='page-item active'><a class='page-link' href='?page-nr=$counter'>$counter</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?page-nr=$counter'>$counter</a></li>";
                    }
                }
            ?>

            <?php if(!isset($_GET['page-nr'])){ ?>
                <li class="page-item">
                    <a class="page-link" href="?page-nr=2">Next</a>
                </li>
            <?php } else if($_GET['page-nr'] >= $pages){ ?>
                <li class="page-item disabled">
                    <a class="page-link">Next</a>
                </li>
            <?php } else { ?>
                <li class="page-item">
                    <a class="page-link" href="?page-nr=<?php echo $_GET['page-nr'] + 1; ?>">Next</a>
                </li>
            <?php } ?>

            <li class="page-item">
                <a class="page-link" href="?page-nr=<?php echo $pages; ?>">Last</a>
            </li>

        </ul>
    </nav>
</div> 
dependent dropsown