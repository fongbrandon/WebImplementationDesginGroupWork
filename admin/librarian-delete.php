<?php

include("includes/header.php");
include("includes/navbar.php");

?>
<?php
$emailErr= $password="";
if(isset($_POST['admin-delete-btn'])&& $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $id= $_POST['delete_id'];

        $sql="DELETE FROM AdminTable  WHERE id='$id'";
        $sql_run = mysqli_qury($connection, $query);
        if($sql_run){
            echo "Admin Profile has been deleted";
            header('Location: admin-list.php');
        }else{
            echo "Admin Profile has NOT been deleted";
            header('Location: admin-list.php');
        }

}

?>
<!---- Begin Page Content ----->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Delete Administrator Profile</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
    <?php
    //connect to db in code.php
    include_once("code.php");
    if(isset($_POST['delete_btn'])){
        $id= $_POST['delete_id'];

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
                    <input type="disable" name="email" class="form-control" value="<?php echo $row['email'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="disable" name="password" class="form-control" value="<?php echo $row['password'] ?>">
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger" href="admin-list.php">Cancel</a>
                    <button type="submit" name="amdin-delete-btn" class="btn btn-danger">Delete</button>
                   
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