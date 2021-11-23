<?php  
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<?php

//check button click
 if(isset($_POST['addlibrarian_btn']) && $_SERVER['REQUEST_METHOD'] == "POST")
 {
     

    //function to clean data before assigment
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
   
     //get info
        $libID = test_input($_POST['id']);
        $firstname = test_input($_POST['fname']);
        $lastname = test_input($_POST['lname']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']); 

        session_start();
        $query = "INSERT TO PatronTable (libID, firstName, lastName, email, password) VALUES('$libID','$firstname', '$lastname',' $email','$password')";
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Librarian

                <!-- trigger Add Librarian Popup -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addlibrarianModal">
                <i class="fas fa-user-plus"></i>
                </button>

            </h6>
        </div>

            <!-- Add Librarian Popup -->
        <div class="modal fade" id="addlibrarianModal" tabindex="-1" aria-labelledby="addlibrarianModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addlibrarianModalLabel">Add New Librarian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="mb-3">
                                <label class="form-label">LibID</label>
                                <input type="text" name="id" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="fname" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="lname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" name="addlibrarian_btn">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Display librarian data -->
        <div class="card-body">
            <div class="table-responsive">
                <?php
                    include_once 'code.php';
                    $result = mysqli_query($conn,"SELECT * FROM Librarian");
                ?>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Lib ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>

                        <tr>
                            <td><?php echo $row["Id"];?></td>
                            <td><?php echo $row["firstname"];?></td>
                            <td><?php echo $row["lastname"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td> 
                                <form action="code.php" method="post">
                                    <input type = "hidden" name="delete_id" value ="<?php echo $row['id'];?>">
                                        <button type ="submit" name="delete_btn" class="btn btn-success">EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="post">
                                    <input type = "hidden" name="delete_id" value ="<?php echo $row['id'];?>">
                                    <button type ="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>  
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
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>