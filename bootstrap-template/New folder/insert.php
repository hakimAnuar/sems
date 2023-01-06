<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert page</title>
</head>
<body>
    <center>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "staff");

        if ($conn == false) {
            die("ERROR: Could not connect." . mysqli_connect_error());
        }

        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $gender = $_REQUEST['gender'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['email'];

        $sql = "INSERT INTO college VALUES ('$first_name', '$last_name', '$gender', '$address', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3> Data stored in db successfully." 
            . " Please browse your localhost phpmyadmin"
            . " to view the updated data</h3>";

            echo nl2br("\n$first_name\n $last_name\n " . "$gender\n $address\n $email");
        }else {
            echo "ERROR: Hush! lmao " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
    </center>
</body>
</html>