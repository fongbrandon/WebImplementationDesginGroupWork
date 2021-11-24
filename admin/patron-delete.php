<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");

?>
<?php
$emailErr= $password="";
if(isset($_POST['delete-btn'])&& $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $id= $_POST['delete_id'];

        $sql="DELETE FROM LibraryCard  WHERE cardID='$id'";
        $sql_run = mysqli_qury($connection, $query);
        if($sql_run){
            echo "Patron Profile has been deleted";
            header('Location: patron-list.php');
        }else{
            echo "Patron Profile has NOT been deleted";
            header('Location: patron-list.php');
        }

}

?>
<!---- Begin Page Content ----->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Delete Patron Profile</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
    <?php
    //connect to db in code.php
   // require('database/dbconfig.php');
    if(isset($_POST['delete_btn'])){
        $id= $_POST['delete_id'];

        $query = "SELECT * FROM  LibraryCard WHERE cardID='$id'";
        $query_run = mysqli_query($connection, $query);
        foreach($query_run as $row){
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                    <label class="form-label">Card ID</label> 
                    <input type="disable" name="id" class="form-control" value="<?php echo $row['cardID'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label> 
                    <input type="disable" name="fname" class="form-control" value="<?php echo $row['Name'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="disable" name="address" class="form-control"  value="<?php echo $row['Address'] ?>">
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger" href="patron-list.php">Cancel</a>
                    <button type="submit" name="delete-btn" class="btn btn-danger">Delete</button>
                   
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