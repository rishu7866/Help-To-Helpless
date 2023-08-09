<?php
include_once './session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods Donation</title>
    <link rel="stylesheet" href="./good.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="./icon.png">
</head>

<body class="bod">
    <!-- NAV************************************************ -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./mm.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link disabled" href="./don.php">Money Donation Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="./order.php">Donation Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="logout()" href="./logout.php"> <img src="./arrow-right-from-bracket-solid.svg" style="width: 12px;"> Logout</a>
                </li>

            </ul>
        </div>
        <div class="logout_img">
            <a href="#"><img src="./arrow-right-from-bracket-solid.svg"></a>
        </div>
        <!-- DB********************************************************* -->

        <?php
        include './connection.php';
        if (isset($_POST['submit1'])) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $product = mysqli_real_escape_string($conn, $_POST['product']);
            $houseno = mysqli_real_escape_string($conn, $_POST['houseno']);
            $city = mysqli_real_escape_string($conn, $_POST['city']);
            $dist = mysqli_real_escape_string($conn, $_POST['dist']);
            $pin = mysqli_real_escape_string($conn, $_POST['pin']);
            $aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
            $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
            $file = mysqli_real_escape_string($conn, $_POST['file']);
            // $status = mysqli_real_escape_string($conn, $_POST['status']);

            $aadharquery = "select * from goods where aadhar='$aadhar'";
            $query = mysqli_query($conn, $aadharquery);
            $aadharcount = mysqli_num_rows($query);
            if ($aadharcount > 0) {
                ?>
                        <script class="msg">
                            alert("Duplicate Aadhar");
                        </script>
                    <?php
                    }else{
                        $insertquery = "insert into goods(name,mobile,email,product,houseno,city,dist,pin,aadhar,quantity,file) values ('$name','$mobile','$email','$product','$houseno','$city','$dist','$pin','$aadhar','$quantity','$file')";
                        $iquery = mysqli_query($conn, $insertquery);
            if ($iquery) {
        ?>
                <script>
                    alert("Inserted Successfully Kindly Check Your Order  Details at Corner");
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
    }
        ?>
    </nav>
    <!-- *************************************form************************************* -->

    <form class="form-det" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

        <div class="laftform">
            <input type="text" onkeyup="textonly(this)" name="name" placeholder="Name" required>
            <br></br>
            <input type="text" onkeyup="numberonly(this)" maxlength="10" name="mobile" placeholder="Mobile Number" required>
            <br></br>
            <input type="text" name="email" placeholder="Enter Gmail id" required>
            <br></br>
            <input type="text" maxlength="16" onkeyup="numberonly(this)" name="aadhar" placeholder="Enter Aadhar Number" required>
            <br></br>
            <input type="text" name="product" placeholder="Enter Product Name" required>
        </div>
        <div class="rightform">
            <input type="text" onkeyup="numberonly(this)" name="houseno" placeholder="House number " required>
            <br></br>
            <input type="text" onkeyup="textonly(this)" name="city" placeholder="Enter City Name" required>
            <br></br>
            <input type="text" onkeyup="textonly(this)" name="dist" placeholder="Enter District Name" required>
            <br></br>
            <input type="text" maxlength="6" onkeyup="numberonly(this)" name="pin" placeholder="Enter Pin Code" required>
            <br></br>
            <input type="number" onkeyup="numberonly(this)" name="quantity" placeholder="Enter Quantity" required>
        </div>
        <br>
        <p>Upload Sample</p>
        <br>
        <input type="file" name="file" required><br></br>
        <button type="submit" name="submit1">Donate</button>
    </form>

    <script src="./admin.js"></script>
</body>

</html>