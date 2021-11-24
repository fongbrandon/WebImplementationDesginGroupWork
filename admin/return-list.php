<?php  
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Returned Books</h6>
        </div>
    

        <!-- Table Display of books in library -->
        <div class="card shadow mb-4">
            <div class="table-responsive">
                <div class="card-body">
                    <?php
                        $result = mysqli_query($conn,"SELECT cardID, ISBN, Date FROM ReturnBook"); //query statement
                        if (mysqli_num_rows($result) > 0) { // check if db has data
                    ?>
                    
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                <tr>
                                    <th>Card#</th>
                                    <th>ISBN</th>
                                    <th>Date</th>
                                </tr>
                                
                            </thead>
                            <tbody>

                                <?php
                                $i=0; //counter
                                while($row = mysqli_fetch_array($result)) { //fetch data
                                ?>
                                <tr>
                                    <td><?php echo $row["cardID"];?></td>
                                    <td><?php echo $row["ISBN"];?></td>
                                    <td><?php echo $row["Date"];?></td>

                                </tr> 
                            </tbody>
                            <?php
                                $i++; //increment counter
                                } // End of while loop
                            ?>
                        </table>

                        <?php //output if no data

                            } 
                            else{
                            echo "All Books were Returned";
                            }
                        ?>
                    </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>  
<!-- End of Main Content -->

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>