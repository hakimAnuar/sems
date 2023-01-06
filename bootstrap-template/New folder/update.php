<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            <?php
                if (isset($_SESSION['status'])) {
                    ?>
                        <div class="alert alert-warning alert-dismissable fade show" role="alert">
                            <strong>Hey!</strong><?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    unset($_SESSION['status']);
                }
            ?>

            <div class="card mt-5">
                <div class="card-header">
                    <h4>Update db by ID</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post">
                        <div class="form-group">
                                            <label for="">ID</label>
                                            <input type="text" name="ID" id="" class="form-control">
                                        
                                            <label for="operatorId" style="color: black">Operator ID:</label>
                                            <input type="text" name="operatorId" class="form-control" style="color: black" value="" required>
                                                    
                                            <label for="pNo" style="color: black">Part Number: </label>
                                            <input type="text" name="pNo" class="form-control" style="color: black" value="" required>
                                                    
                                            <label for="quantity" style="color: black">Quantity: </label>
                                            <input type="text" name="quantity" class="form-control" style="color: black" value="" required>

                                            <div class="row form-group">
                                            <label for="supplyDate" style="color: black">Supply Date:</label>
                                                <div class="input-group date" id="supply">
                                                    <input type="text" name="supplyDate" class="form-control" style="color: black" placeholder="DD/MM/YYYY" value="" required>
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
                                            <input type="submit" name="update" class="btn btn-success" >
                                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>