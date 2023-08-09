<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./don.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./mm.php">Home</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./gdon.php">Good Donation Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="logout()" href="./logout.php"> <img src="./arrow-right-from-bracket-solid.svg" style="width: 12px;"> Logout</a>
                </li>

                <h2 style="color: red;">Scan Pay And Fill The Form</h2>
            </ul>

        </div>
        <div class="right">
            <a href="./logout.php"><img src="./arrow-right-from-bracket-solid.svg"></a>
        </div>
    </nav>


    <div class="wrapper">
        <h2>
            Money Donation Form</h2>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <h4>
                Account</h4>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" placeholder="Full Name" required class="name" name="name">
                    <i class="fa fa-user icon"></i>
                </div>
                <div class="input-box">
                    <input type="text" onkeyup="numberonly(this)" placeholder="Aadhar" class="name" name="aadhar" required>
                    <i class="fa fa-user icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="email" placeholder="Email Adress" required class="name" name="email">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div>
                    <h4>Gender</h4>
                    <input type="radio" class="radio-button" name="gender" value="Male" required>
                    <label>Male</label>
                    <input type="radio" class="radio-button" name="gender" value="Female">
                    <label>Female</label><br></br>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" onkeyup="numberonly(this)" placeholder="Enter Ammount" required class="name" name="amt">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <div class="input-group">
                <div class="input-box">
                    <input type="text" placeholder="Enter Upi ID" required class="name" name="upi">
                    <i class="fa fa-envelope icon"></i>
                </div>
            </div>
            <input class="final" type="submit" value="Submit" name="submit">
            <?php
            include './connection.php';
            if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                $upi = mysqli_real_escape_string($conn, $_POST['upi']);

                $insertquery = "insert into money(name,aadhar,email,gender,upi) values ('$name','$aadhar','$email','$gender','$upi')";
                $iquery = mysqli_query($conn, $insertquery);

                if ($iquery) {
            ?>
                    <script>
                        alert("Insert Successfully");
                    </script>
                <?php

                } else {
                ?>
                    <script>
                        alert("Not Inserted");
                    </script>
            <?php
                }
            }
            ?>
        </form>
    </div>
    <script src="./admin.js"></script>
</body>

</html>