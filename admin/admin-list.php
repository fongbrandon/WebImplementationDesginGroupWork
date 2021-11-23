<?php  
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?> 
<?php

//check button click
 if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST")
 {
     

    //function to clean data before assigment
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
   
     //get info
        $firstname = test_input($_POST['fname']);
        $lastname = test_input($_POST['lname']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']); 

        session_start();
        $query = "INSERT TO adminTable (firstName, lastName, email, password) VALUES('$firstname', '$lastname',' $email','$password')";
        $query_run=mysqli_query($connection, $query);
        
    
    
        if($query_run){
        echo"Added";
        header('Location: admin-list.php');

    }else{
        echo"Not Added";
        header('Location: admin-list.php');
    }
     mysqli_close($connection);
}
?>

<!---- Begin Page Content ----->
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">New Administrator</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-3">
                    <label class="form-label">First Name</label> 
                    <input type="text" name="fname" class="form-control" require>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control" require>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" require>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" require>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-secondary" data-bs-dismiss="modal" value="Close">
                    <button type="submit" name="submit" class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal" >Save Changes</button>
                    <!-- <input type="submit" class="btn btn-primary" name="submit" class="form-control" value="Save Changes" data-bs-target="#exampleModal" data-bs-toggle="modal" > -->
                </div>
        </form>
        </div>
        </div>
        </div>
        </div>

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Administrator
        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i class="fas fa-user-plus"></i></a>
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">
        <?php
        $result = mysqli_query($conn,"SELECT * FROM adminTable");
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
        <th>Admin ID</th>
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
        <form action="admin-edit.php" method="post">
            <input type = "hidden" name="edit_id" value ="<?php echo $row['Id'];?>">
            <button type ="submit" name="edit_btn" class="btn btn-success">EDIT</button>
        </form>
        </td>
        <td>
        <form action="admin-delete.php" method="post">
            <input type = "hidden" name="delete_id" value ="<?php echo $row['Id'];?>">
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

<?


include('includes/footer.php');
include('includes/scripts.php');
?>