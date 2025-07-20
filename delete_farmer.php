<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include'Connection.php';

    $farmer_id = $_POST['farmer_id'];

    $sql = "DELETE FROM farmer_registration WHERE farmer_id='$farmer_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
