<?php

include'Connection.php';


$sql = "SELECT * FROM farmer_registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li class='flex justify-between bg-white px-4 py-2 border rounded-md shadow-sm'>
                <div>
                    <span class='font-bold'>Name:</span> " . $row["farmer_name"] . "<br>
                    <span class='font-bold'>Phone:</span> " . $row["phone"] . "<br>
                    <span class='font-bold'>Address:</span> " . $row["address"] . "<br>
                    <span class='font-bold'>Region Code:</span> " . $row["region_code"] . "
                </div>
                <div class='flex space-x-2'>
                    <form action='update_form.php' method='POST'>
                        <input type='hidden' name='farmer_id' value='" . $row["farmer_id"] . "'>
                        <input type='hidden' name='farmer_name' value='" . $row["farmer_name"] . "'>
                        <input type='hidden' name='phone' value='" . $row["phone"] . "'>
                        <input type='hidden' name='address' value='" . $row["address"] . "'>
                        <input type='hidden' name='region_code' value='" . $row["region_code"] . "'>
                        <button type='submit' class='text-blue-500 hover:text-blue-700'>Update</button>
                    </form>
                    <form action='delete_farmer.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>
                        <input type='hidden' name='farmer_id' value='" . $row["farmer_id"] . "'>
                        <button type='submit' class='text-red-500 hover:text-red-700'>Delete</button>
                    </form>
                </div>
              </li>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
