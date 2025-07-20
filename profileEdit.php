<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Profile: <?php echo $_SESSION['Username']; ?></title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css" />
    <style>
        /* Additional CSS styles for the profile page */

        ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    height: 70px;
    margin-top: -70px;
    margin-left: -4px;
    margin-right: -8px;
    
}
  
  li {
    float: right;
  }
  
  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  
  /* Change the link color to #111 (black) on hover */
  li a:hover {
    background-color: #111;
  }


        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Add a light background color */
        }

        .container {
            margin-top: 50px; /* Add margin to push content down */
        }

        .profile-header {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        .profile-picture {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info input[type="text"],
        .profile-info input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .profile-info select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .profile-info input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-info input[type="submit"]:hover {
            background-color: green;
        }
    </style>
</head>
<body>
<ul>
<li><a href="#home">Home</a></li>
<li><a class="active" href="#about">About</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="#news">News</a></li>

 
  
 
</ul>

    <?php require 'menu.php'; ?>

    <div class="container">
        <div class="profile-header">
            <img src="<?php echo 'images/profileImages/'.$_SESSION['picName'].'?'.mt_rand(); ?>" alt="Profile Picture" class="profile-picture">
            <h2><?php echo $_SESSION['Name'];?></h2>
            <h4><?php echo $_SESSION['Username'];?></h4>
            <form method="post" action="Profile/updatePic.php" enctype="multipart/form-data">
                <input type="file" name="profilePic" id="profilePic">
                <br>
                <div class="12u$">
                    <input type="submit" class="btn btn-primary" name="upload" value="Upload" />
                    <input type="submit" class="btn btn-danger" name="remove" value="Remove" />
                </div>
            </form>
        </div>
        <div class="profile-info">
            <form method="post" action="Profile/updateProfile.php">
                <input type="text" name="name" id="name" value="<?php echo $_SESSION['Name'];?>" placeholder="Full Name" required />
                <input type="text" name="mobile" id="mobile" value="<?php echo $_SESSION['MobileNo'];?>" placeholder="Mobile No" required/>
                <input type="text" name="uname" id="uname" value="<?php echo $_SESSION['Username'];?>" placeholder="Username" required/>
                <input type="email" name="email" id="email" value="<?php echo $_SESSION['Email'];?>" placeholder="Email" required/>
                <select name="section" id="section">
                    <option value="<?php echo $_SESSION['Section'];?>"><?php echo $_SESSION['Section'];?></option>
                    <option value="Band">Band</option>
                    <option value="Drama">Drama</option>
                    <option value="Dance">Dance</option>
                    <option value="Decoration">Decoration</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" name="post" id="post" value="<?php echo $_SESSION['Post'];?>" placeholder="Post Name" required/>
                <p><b>Education : </b></p>
                <input type="radio" id="diploma" name="edu" value="Diploma" checked>
                <label for="diploma">Diploma</label>
                <input type="radio" id="btech" name="edu" value="B.TECH">
                <label for="btech">B.TECH</label>
                <input type="radio" id="mtech" name="edu" value="M.TECH">
                <label for="mtech">M.TECH</label>
                <p><b>Choose Year : </b></p>
                <input type="radio" id="1" name="year" value="1" checked>
                <label for="1">1<sup>st</sup> Year</label>
                <input type="radio" id="2" name="year" value="2">
                <label for="2">2<sup>nd</sup> Year</label>
                <input type="radio" id="3" name="year" value="3">
                <label for="3">3<sup>rd</sup> Year</label>
                <input type="radio" id="4" name="year" value="4">
                <label for="4">4<sup>th</sup> Year</label>
                <input type="submit" class="btn btn-success" value="Update Profile" />
            </form>
        </div>
    </div>

</body>
</html>
