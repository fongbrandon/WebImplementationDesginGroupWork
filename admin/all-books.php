<!-- List all Books Avaliable in library -->

<?php  
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Books</h6>
        </div>
    

        <!-- Table Display of books in library -->
        <div class="card shadow mb-4">
            <div class="table-responsive">
                <div class="card-body">
                    <?php
                        $result = mysqli_query($conn,"SELECT * FROM Book WHERE Quantity > 0"); //query statement
                        if (mysqli_num_rows($result) > 0) { // check if db has data
                    ?>
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                <tr>
                                    <th>BookCover</th>
                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Year</th>
                                    <th>Subject Area</th>
                                    <th>Quantity</th>
                                </tr>
                                
                            </thead>
                            <tbody>

                                <?php
                                $i=0; //counter
                                while($row = mysqli_fetch_array($result)) { //fetch data
                                ?>
                                <tr>
                                    <td> <img class="rounded-circle" src='<?php echo $row["BookCover"];?>' alt="..."></td>
                                    <td><?php echo $row["ISBN"];?></td>
                                    <td><?php echo $row["Title"];?></td>
                                    <td><?php echo $row["Author"];?></td>
                                    <td><?php echo $row["Year"];?></td>
                                    <td><?php echo $row["SubjectArea"];?></td>
                                    <td><?php echo $row["Quantity"];?></td>
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
                            echo "No result found";
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