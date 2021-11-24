<!-- Update a Patron Account in HighSchoolBook_DS -->

<?php
include("includes/header.php");
include("includes/navbar.php");
?>

<?php
//connect to db in code.php
 require("database/dbconfig.php");

//update database 
if(isset($_POST['patron-update-btn'])&& $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $id= $_POST['edit_id'];
   
       //function to clean data before assigment
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
    //    fna-hgjt-urv
    if(!empty($_POST['id']) && !preg_match('/[<>%*/|^()#""?+=_~`@!&{}:;\$]/g,')){
        $id =test_input($_POST['id']);
       }

       if(!empty($_POST['address']) && !preg_match('/[<>%*/|^()#""?+=_~`@!&{}:;\$]/g,')){
        $address =test_input($_POST['address']);
       }

        $sql="UPDATE LibraryCard SET cardID='$id', Address='$address' WHERE cardID='$id'";
        $sql_run = mysqli_query($connection, $query);
        if($sql_run){
            echo "Patron Profile has been updated";
            header('Location: patron-list.php');
        }else{
            echo "Patron Profile has NOT been updated";
            header('Location: patron-list.php');
        }

}

?>
<!---- Begin Page Content ----->
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Patron Profile</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
    <?php
    //connect to db in code.php
    require('database/dbconfig.php');
    if(isset($_POST['edit_btn'])){
        $id= $_POST['edit_id'];

        $query = "SELECT * FROM  LibraryCard WHERE cardID='$id'";
        $query_run = mysqli_query($connection, $query);
        foreach($query_run as $row){
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                    <label class="form-label">Card ID</label> 
                    <input type="text" name="id" pattern='/[<>%*/|^()#""?+=_~`@!&{}:;\$]/g,' class="form-control" value="<?php echo $row['cardID'] ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label> 
                    <input type="disable" name="fname" class="form-control" value="<?php echo $row['Name'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" pattern='/[<>%*/|^()#""?+=_~`@!&{}:;\$]/g,' value="<?php echo $row['Address'] ?>">
                </div>
                <div class="modal-footer">
                    <a role="button" class="btn btn-danger" href="patron-list.php">Cancel</a>
                    <button type="submit" name="update-patron-btn" class="btn btn-success">Update</button>
                   
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