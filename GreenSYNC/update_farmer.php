<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include'Connection.php';

    $farmer_id = $_POST['farmer_id'];
    $farmer_name = $_POST['farmer_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $region_code = $_POST['region_code'];

    $sql = "UPDATE farmer_registration SET farmer_name='$farmer_name', phone='$phone', address='$address', region_code='$region_code' WHERE farmer_id='$farmer_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
