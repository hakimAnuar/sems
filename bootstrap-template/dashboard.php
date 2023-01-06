<?php
include 'header.php';
include 'db_connect.php';
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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" style="background-color: #142739;">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">S-EMS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <a href="dashboard.php" class="col-md-2 btn btn-danger btn-bg " id="dashboard">Admin</a>
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
                        Operator
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-white">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="row">
                            
                            <!-- button for new receiving & supplying (modal) -->
                            <!-- <div class="col-md-12 text-center">
                            <button data-bs-toggle="modal" data-bs-target="#receiveIn" class="col-md-2 float-right btn btn-bg " style="background-color: #00ff00;"><i class="fa-solid fa-download"></i> New Receiving</button>
                            <button data-bs-toggle="modal" data-bs-target="#supplyOut" class="col-md-2 float-right btn btn-primary btn-bg "><i class="fa-solid fa-upload"></i> New Supplying</button>
                            </div>

                            -- Start New Receiving --
                            <div id="receiveIn" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 style="color: black">New Receiving</h3>
                                            <a data-bs-dismiss="modal" class="close"><i class="fa-regular fa-circle-xmark"></i></a>
                                        </div>

                                        -- either receiving.php or managereceiving.php decision pending --
                                        <form action="receive.php" method="POST">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="operatorId" style="color: black">Operator ID:</label>
                                                    <input type="text" name="operatorId" class="form-control" style="color: black" value="" required>
                                                    
                                                    <label for="pNo" style="color: black">Part Number: </label>
                                                    <input type="text" name="pNo" class="form-control" style="color: black" value="" required>
                                                    
                                                    <label for="quantity" style="color: black">Quantity: </label>
                                                    <input type="text" name="quantity" class="form-control" style="color: black" value="" required>

                                                    <label for="receiveDate" style="color: black">Received Date:</label>
                                                    <input type="text" name="receiveDate" class="form-control" style="color: black" placeholder="DD/MM/YYYY" value="" required>
                                                    
                                                    <label for="expiryDate" style="color: black">Expiry Date: </label>
                                                    <input type="text" name="expiryDate" class="form-control" style="color: black" placeholder="DD/MM/YYYY" value="" required>
                                                    
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                                                <input type="submit" name="insertdata" class="btn btn-success" onClick="window.location.reload();">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                            
                        
                        -- end of new receiving --

                        -- start New supplying --
                        <div class="col-md-12 text-center">
                        </div>
                            <div id="supplyOut" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 style="color: black">New supplying</h3>
                                            <a data-bs-dismiss="modal" class="close"><i class="fa-regular fa-circle-xmark"></i></a>
                                        </div>

                                        -- either supply.php or manage-supplying.php decision pending --
                                        <form action="supply.php" method="POST">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="operatorId" style="color: black">Operator ID:</label>
                                                    <input type="text" name="operatorId" class="form-control" style="color: black" value="" required>
                                                    
                                                    <label for="pNo" style="color: black">Part Number: </label>
                                                    <input type="text" name="pNo" class="form-control" style="color: black" value="" required>
                                                    
                                                    <label for="quantity" style="color: black">Quantity: </label>
                                                    <input type="text" name="quantity" class="form-control" style="color: black" value="" required>
                                                
                                                    <label for="receiveDate" style="color: black">Supply Date:</label>
                                                    <input type="text" name="supplyDate" class="form-control" style="color: black" value="" required>
                                                    
                                                    <label for="expiryDate" style="color: black">Expiry Date: </label>
                                                    <input type="text" name="expiryDate" class="form-control" style="color: black" value="" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" name="insertdata1" class="btn btn-success" onClick="window.location.reload();">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                        <!-- end of new supply -->

                        <!-- Start table -->
                        <div class="container-fluid">
                            <div class="col-lg-12">
                                <div class="row">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <b>Priority List</b>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                <table class="table tablesorter">
                                                    <thead>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Operator ID</th>
                                                        <th class="text-center">Part Number</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">Receive Date</th>
                                                        <th class="text-center">Expiry Date</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        $i = 1;
                                                        $receiving = $conn->query("SELECT * FROM test ORDER BY expiry_date ASC LIMIT 3");
                                                        while($row=$receiving->fetch_assoc()):
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $i++ ?></td>
                                                            <td class="text-center"><?php echo $row['operator_id'] ?></td>
                                                            <td class="text-center"><?php echo $row['part_no'] ?></td>
                                                            <td class="text-center"><?php echo $row['qty'] ?></td>
                                                            <td class="text-center"><?php echo date("d/m/Y",strtotime($row['receive_date'])) ?></td>
                                                            <td class="text-center"><?php echo date("M/Y",strtotime($row['expiry_date'])) ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end table -->
                        
                        <!-- buttons -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="manage-receiving.php" class="col-md-2 btn btn-bg " style="background-color: #00ff00;"id="new_receiving"><i class="fa-solid fa-download"></i> New Receiving</a>
                                <a href="manage-supply.php" class="col-md-2 btn btn-primary btn-bg " id="new_supplying"><i class="fa-solid fa-upload"></i> New Supplying</a>
                            </div>
                        </div>
                        
                        

                        </div>
                        </div>
                    </div>
                </main>

                <!-- footer -->
                <footer class="py-4  mt-auto" style="background-color: #142739;">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted text-white">Copyright &copy; ihml_plskm 2022</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>
        $('table').dataTable()
        $('#new_receiving').click(function(){
            location.href = "index.php?page=manage_receiving"
        })
        $('.delete_receiving').click(function(){
            _conf("Are you sure to delete this data?","delete_receiving",[$(this).attr('data-id')])
        })
        function delete_receiving($id){
            start_load()
            $.ajax({
                url:'ajax.php?action=delete_receiving',
                method:'POST',
                data:{id:$id},
                success:function(resp){
                    if(resp==1){
                        alert_toast("Data successfully deleted",'success')
                        setTimeout(function(){
                            location.reload()
                        },1500)

                    }
                }
            })
        }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
