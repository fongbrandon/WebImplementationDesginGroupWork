<?php  
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Table header -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Patrons
                    <!-- trigger Add Guest Popup -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addguestModal">
                    <i class="fas fa-user-plus"></i>
                    </button>
                </h6>
            </div>

            <!-- Add Guest Popup -->
            <div class="modal fade" id="addguestModal" tabindex="-1" aria-labelledby="addguestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addguestModalLabel">Add New Patron</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Patron Name</label>
                                    <input type="email" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Patron Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" name="addguest_btn">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Display of guest data -->
            <div class="card-body">
                <div class="table-responsive">
                <?php
                include_once 'code.php';
                $query_run = mysqli_query($conn,"SELECT * FROM guestTable");
                ?>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                ?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CARD ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                while($row = mysqli_fetch_array($query_run)){
                            ?>
                            <tr>
                                <td><?php echo $row['cardID']; ?></td>
                                <td><?php echo $row['first name']; ?></td>
                                <td><?php echo $row['last name']; ?></td>
                                <td>
                                <form action="code.php" method="post">
                                    <input type = "hidden" name="edit_id" value ="<?php echo $row['cardID'];?>">
                                        <button type ="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                    <input type = "hidden" name="delete_id" value ="<?php echo $row['cardID'];?>">
                                        <button type ="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- Empty guest tables -->
                    <?php
                    }
                    else{
                    echo "No result found";
                    }
                    ?>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<!-- End of Main Content -->


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>