<?php

include 'Connection.php';

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO farmer_registration (farmer_name, phone, address, region_code) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $farmer_name, $phone, $address, $region_code);

// Set parameters and execute
$farmer_name = $_POST['farmer_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$region_code = $_POST['region_code'];

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}
header("Location: index.php");
exit();
$stmt->close();
$conn->close();
?>
