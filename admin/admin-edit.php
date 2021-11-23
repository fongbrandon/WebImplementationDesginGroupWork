<?php

include("includes/header.php");
include("includes/navbar.php");

?>
<?php
//connect to db in code.php
require("database/dbconfig.php");

//declaration of variables
$emailErr= $password="";

//update database 
if(isset($_POST['admin-update-btn'])&& $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $id= $_POST['edit_id'];
   
       //function to clean data before assigment
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }

       if(!empty($_POST['email']) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = test_input($_POST["email"]);
       }else {
        $emailErr = "Invalid email format";
        }

        if(!empty($_POST['password']) && preg_match("/^[a-zA-Z-' ]*$/",$password)){
        $password = test_input($_POST["password"]);
        }else {
        $passwordErr = "Only letters and spaces";
        }

        $email =$_POST['email'];
        $password = $_POST['password'];


        $sql="UPDATE AdminTable SET email='$email', password='$password' WHERE id='$id'";
        $sql_run = mysqli_qury($connection, $query);
        if($sql_run){
            echo "Admin Profile has been updated";
            header('Location: admin-list.php');
        }else{
            echo "Admin Profile has NOT been updated";
        }

}

?>
<!---- Begin Page Content ----->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Administrator Profile</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
    <?php
    /// fill information for ID
    if(isset($_POST['edit_btn'])){
        $id= $_POST['edit_id'];

        $query = "SELECT * FROM  AdminTable WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);
        foreach($query_run as $row){
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-3">
                    <label class="form-label">First Name</label> 
                    <input type="disable" name="fname" class="form-control" value="<?php echo $row['firstname'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="disable" name="lname" class="form-control" value="<?php echo $row['lastname'] ?>" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label><?php echo $emailErr ;?>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $row['password'] ?>">
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