<!-- Update a librarian account in HighSchoolBooks_DB -->

<?php
include("includes/header.php");
include("includes/navbar.php");
?>
<?php
//connect to db in code.php

//declaration of variables
 $password="";

//update database 
if(isset($_POST['librarian-update-btn'])&& $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $id= $_POST['edit_id'];
   
       //function to clean data before assigment
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }

       if(!empty($_POST['usertype'])){
           $usertype=$_POST['usertype'];
       }

        if(!empty($_POST['password']) && preg_match("/^[a-zA-Z-' ]*$/",$password)){
        $password = test_input($_POST["password"]);
        }else {
        $passwordErr = "Only letters and spaces";
        }

        $usertype =$_POST['usertype'];
        $password = $_POST['password'];


        $sql="UPDATE Librarian SET Type='$usertype', Password='$password' WHERE libID='$id'";
        $sql_run = mysqli_qury($connection, $query);
        if($sql_run){
            echo "Librarian Profile has been updated";
            header('Location: admin-list.php');
        }else{
            echo "Librarian Profile has NOT been updated";
        }

}

?>
<!---- Begin Page Content ----->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Librarian Profile</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
    <?php
    //connect to db 
    require("database/dbconfig.php");
    if(isset($_POST['edit_btn'])){
        $id= $_POST['edit_id'];

        $query = "SELECT * FROM  Librarian WHERE libID='$id'";
        $query_run = mysqli_query($connection, $query);
        foreach($query_run as $row){
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-3">
                    <label class="form-label">Name</label> 
                    <input type="disable" name="name" class="form-control" value="<?php echo $row['Name'] ?>">
                <div class="mb-3">
                    <label class="form-label">Email</label><?php echo $emailErr ;?>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['Email'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" max= class="form-control" value="<?php echo $row['password'] ?>">
                </div>
                <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Role
                </button>
                <select name="usertype" class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
                    <option value="Admin" class="dropdown-item">Admin</option>
                    <option value="Librarian" selected class="dropdown-item">Librarian</option>
                </select>
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger" href="admin-list.php">Cancel</a>
                    <button type="submit" name="amdin-update-btn" class="btn btn-success">Update</button>
                   
                </div>
            </form>

        <?php
        }
    }
    ?>
    </table>
</div>
    </div>
    </div>
    <!-- End of Page Conent -->
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>