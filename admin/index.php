<?php 
    include('security.php');
    include('includes/header.php');
    include('includes/navbar.php');
 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Total Patrons Accounts-->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Patrons Accounts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                             require('database/dbconfig.php');
                              $query="SELECT id FROM Patrons ORDER BY id";
                              $query_run = mysqli_query($connection, $query);
                              $row = mysqli_num_rows($query_run);
                              echo $row;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Librarian Accounts -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Librarian Accounts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                             require('database/dbconfig.php');
                              $query="SELECT id FROM Librarian ORDER BY id";
                              $query_run = mysqli_query($connection, $query);
                              $row = mysqli_num_rows($query_run);
                              echo $row;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Admin Accounts -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Administrator Accounts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                             require('database/dbconfig.php');
                              $query="SELECT id FROM Admin ORDER BY id";
                              $query_run = mysqli_query($connection, $query);
                              $row = mysqli_num_rows($query_run);
                              echo $row;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pending Requests  -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                             require('database/dbconfig.php');
                              $query="SELECT id FROM Requests ORDER BY id";
                              $query_run = mysqli_query($connection, $query);
                              $row = mysqli_num_rows($query_run);
                              echo $row;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4 ">

        <!-- Illustrations -->
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Welcome to DHL Management System</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="...">
                </div>
                <p>This is the Administrator View for Demi High School Library System</p>
                <p>Manage all Patrons, Librarian and Administrator accounts</p>
            </div>
        </div>
</div>
        </div>

</div>
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
