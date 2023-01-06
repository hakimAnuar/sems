<?php
include "db_connect.php";
include "header.php";

if (isset($_POST['updateIn'])) {
    $id = $_POST['id'];
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    // $email = $_POST['email'];
    // $gender = $_POST['gender'];
    // $password = $_POST['password'];
    $operator_id = $_POST['operatorId'];
    $part_number = $_POST['pNo'];
    $quantity = $_POST['quantity'];
    $receive_date = $_POST['receiveDate'];
    $expiry_date = $_POST['expiryDate'];

    // $sql = "UPDATE `users` SET `firstname` = '$first_name', `last_name` = '$last_name', 
    // `email` = '$email', `password` = '$password', `gender` = '$gender' WHERE `id` = '$user_id' ";

    $sql = "UPDATE `test` SET `operator_id` = '$operator_id', `part_no` = '$part_number', 
    `qty` = '$quantity', `receive_date` = '$receive_date', `expiry_date` = '$expiry_date' WHERE id = '$id' ";

    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM `test` WHERE `id` = '$id'";
    $result = $conn->query($sql);


    ?>

        

        <div class="card-body">
            <form action="" method="POST">
                                    

            <div class="form-group">
            <label for="operatorId" style="color: black">Operator ID:</label>
            <input type="text" name="operatorId" class="form-control" style="color: black" value="" required>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    
            <label for="pNo" style="color: black">Part Number: </label>
            <input type="text" name="pNo" class="form-control" style="color: black" value="" required>
                                                    
            <label for="quantity" style="color: black">Quantity: </label>
            <input type="text" name="quantity" class="form-control" style="color: black" value="" required>

            <div class="row form-group">
            <label for="receiveDate" style="color: black">Received Date:</label>
                <div class="input-group date" id="receive">
                    <input type="text" name="receiveDate" class="form-control" style="color: black" placeholder="DD/MM/YYYY" value="" required>
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
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <a href="dashboard.php"><button type="button" class="btn btn-default" data-bs-dismiss="modal" href="dashboard.php">Cancel</button></a>
                <input type="submit" name="updateIn" class="btn btn-success" onClick="window.location.reload();">
            </div>

            </form>
        </div>
        
        
    <?php
}
?>