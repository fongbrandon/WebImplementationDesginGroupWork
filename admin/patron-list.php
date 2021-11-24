<!-- List all Registered Patrons in Library -->

<?php  
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<?php

//check button click
 if(isset($_POST['addPatron_btn']) && $_SERVER['REQUEST_METHOD'] == "POST")
 {
     

    //function to clean data before assigment
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
   
     //get info
        $cardID = test_input($_POST['id']);
        $name = test_input($_POST['name']);
        $address = test_input($_POST['address']);

        session_start();
        $query = "INSERT TO LibraryCard(cardID, Name, Address) VALUES('$cardID','$name','$address')";
        $query_run=mysqli_query($connection, $query);
        
    
    
        if($query_run){
        echo"Added";
        header('Location: patron-list.php');

    }else{
        echo"Not Added";
        header('Location: patron-list.php');
    }
     mysqli_close($connection);
}
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
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="mb-3">
                                    <label class="form-label">Card ID</label>
                                    <input type="email" name="id" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name"  class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="address" name="address" class="form-control">
                                </div>
                                 <!-- Default user type -->
                                <input type="hidden" name="usertype" value="Patron">
                                <div class="modal-footer">
                                    <input type="reset" role="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Close">
                                    <button type="button" class="btn btn-primary" name="addPatron_btn">Save changes</button>

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
                $query_run = mysqli_query($conn,"SELECT * FROM LibraryCard");
                ?>
                <?php
                if (mysqli_num_rows($query_run) > 0) {
                ?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Card#</th>
                            <th>Name</th>
                            <th>Address</th>
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
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
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