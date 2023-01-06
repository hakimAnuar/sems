<?php
include "header.php";
include "db_connect.php"
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>S-EMS</title>
        
    </head>
    <body class="sb-nav-fixed" style= "background-color: #142739;">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">S-EMS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>

            

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav"> 
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link" href="inventory.html" >
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-scroll"></i></div>
                                Inventory
                            </a>
                            
                            <a class="nav-link" href="receiving.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-download"></i></div>
                                Receiving <link rel="stylesheet" href="">
                            </a>
                             
                            <a class="nav-link" href="supply.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-upload"></i></i></div>
                                Supply
                            </a>

                            <a class="nav-link" href="hold-part.html">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-hand"></i></div>
                                Hold part list <link rel="stylesheet" href="">
                            </a>

                            <a class="nav-link" href="part-list.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                Part list <link rel="stylesheet" href="">
                            </a>

                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables <link rel="stylesheet" href="">
                            </a>

                            <a class="nav-link" href="users.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users <link rel="stylesheet" href="">
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div> 
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
            
            <?php
                if (isset($_GET['id'])) {
                    $user_id = $_GET['id'];
                    $sql = "SELECT * FROM `test` WHERE `id` = '$user_id'";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $operator_id = $_POST['operatorId'];
                            $part_number = $_POST['pNo'];
                            $quantity = $_POST['quantity'];
                            $receive_date = $_POST['receiveDate'];
                            $expiry_date = $_POST['expiryDate'];
                            $id = $row['id'];
                        }
                
                    ?>
                
                <div class="container-fluid px-4">
                        
                        <h1 class="mt-4 text-white">Edit Receiving</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit receiving</li>
                        </ol>
                    
                        <div class="card mb-4">
                            <div class="card-header">
                                <b class="col-sm-4">Edit receiving</b>
                            </div>
                           
                            <div class="card-body">
                                <form action="update.php" method="POST">
                                    

                                        <div class="form-group">
                                            <label for="operatorId" style="color: black">Operator ID:</label>
                                            <input type="text" name="operatorId" class="form-control" style="color: black" value="<?php echo $operator_id; ?>" required>
                                            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
       
                                            <label for="pNo" style="color: black">Part Number: </label>
                                            <input type="text" name="pNo" class="form-control" style="color: black" value="<?php echo $part_number; ?>" required>
                                                    
                                            <label for="quantity" style="color: black">Quantity: </label>
                                            <input type="text" name="quantity" class="form-control" style="color: black" value="<?php echo $quantity; ?>" required>

                                            <div class="row form-group">
                                            <label for="receiveDate" style="color: black">Received Date:</label>
                                                <div class="input-group date" id="receive">
                                                    <input type="text" name="receiveDate" class="form-control" style="color: black" placeholder="DD/MM/YYYY" value="<?php echo $receive_date; ?>" required>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text bg-white d-block">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row form-group">
                                            <label for="expiryDate" style="color: black">Expiry Date: </label>
                                                <div class="input-group date" id="expiry">
                                                    <input type="text" name="expiryDate" class="form-control" style="color: black" placeholder="DD/MM/YYYY" value="" required>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text bg-white d-block">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>       
                                            </div>
                                    

                                        <div class="modal-footer">
                                            <a href="dashboard.php"><button type="button" class="btn btn-default" data-bs-dismiss="modal" href="dashboard.php">Cancel</button></a>
                                            <input type="submit" name="updateIn" class="btn btn-success" onClick="window.location.reload();">
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                
                        
                    <?php
                    } else {
                        header('Location: view.php');
                    }
                }
                ?>

                    
                </main>
                
            </div>
        </div>
        

        <script type="text/javascript">
            $(function () {
                $('#receive').datepicker({
                    format: "dd/mm/yyyy",
                    todayBtn: "linked",
                    orientation: "top left"
                });
            });

            $(function () {
                $('#expiry').datepicker({
                    format: "dd/mm/yyyy",
                    orientation: "top left"
                });
            });

        </script>
    </body>
</html>
