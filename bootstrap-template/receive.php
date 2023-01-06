<?php
include "db_connect.php";

if (isset($_POST['insertdata'])) {
    $operator_id = $_POST['operatorId'];
    $part_number = $_POST['pNo'];
    $quantity = $_POST['quantity'];
    $receive_date = $_POST['receiveDate'];
    $expiry_date = $_POST['expiryDate'];
    

    $sql = "INSERT INTO test (`operator_id`, `part_no`, `qty`, `receive_date`, `expiry_date`)
    VALUES ('$operator_id', '$part_number', '$quantity', STR_TO_DATE('$receive_date', '%d/%m/%Y'), STR_TO_DATE('$expiry_date', '%d/%m/%Y'))";

    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>


