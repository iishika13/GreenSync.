<?php
session_start();

// Include database connection and functions file
require 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['ausername'];
    $password = $_POST['apassword'];

    // Retrieve admin data from the database based on the provided username and password
    $query = "SELECT * FROM admin WHERE ausername='$username' AND apassword='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        // Redirect to admin profile page
        $_SESSION['admin_id'] = $admin['aid'];
        header("Location: adminprof.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="adminlogin.css">
</head>
 

<body>

<div>
<ul>
<li style="float:right"><a href="adminlog.php">Admin</a></li>
  <li style="float:right"><a href="Login/error.php">Forum</a></li>
  <li style="float:right"><a href="index.php">Login</a></li>
  <li style="float:right"><a href="Login/error.php">MyCart</a></li>
  <li style="float:right"><a class="active" href="index.php">Home</a></li>
</ul>

</div>





<div class="login-form">
    <h2>Admin Login</h2>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="ausername" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="apassword" required>
        </div>
        <button type="submit" class="btn-login">Login</button>
    </form>
</div>

</body>
</html>



