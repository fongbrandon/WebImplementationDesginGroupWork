<?php  

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Book Categories</h6>
        </div>

        <!-- Table Display Category data -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                        $result = mysqli_query($conn,"SELECT SubjectArea, Quantity FROM Book");
                    ?>
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                    ?>
                    
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Number of Books</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["SubjectArea"];?></td>
                                <td><?php echo $row["Quantity"];?></td>
                                </tr>
                            </tbody>
                            <?php
                                $i++;
                                }
                            ?>
                        </table>
                        <?php
                            }
                            else{
                            echo "No result found";
                            }
                        ?>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>