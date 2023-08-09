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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="./orderr.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="bar">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./gdon.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./volunteer.php">Register as Volunteer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="./don.php">Money Donation Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="logout()" href="./logout.php"> <img src="./arrow-right-from-bracket-solid.svg" style="width: 12px;"> Logout</a>
                </li>
            </ul>
        </div>
        <div class="logout_img">
            <a href="#"><img src="./arrow-right-from-bracket-solid.svg"></a>
        </div>
    </nav>
    <form action="" method="post">
        <label style="font-weight: bold;">Enter City Name To See Volunteer List :</label>
        <input type="text" name="city">
        <input type="submit" name="try">
    </form>

    <table align="center" border="2px" style="width: 600px; line-height:40px">
        <tr>
            <th colspan="5" style="margin-left: 40%;">
                <h2>Volunteer List</h2>
            </th>
        </tr>
        <t>
            <th>Name</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>City</th>

        </t>
        <?php
        include './connection.php';
        if (isset($_POST['try'])) {
            $city = mysqli_real_escape_string($conn, $_POST['city']);

            $cityquery = "select * from goods where city='$city' ";
            $query = mysqli_query($conn, $cityquery);
            $citycount = mysqli_num_rows($query);
            $query2 = "select * from vol where city='$city'";
            $result = mysqli_query($conn, $query2);

            if ($citycount) {


                while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['gender']; ?></td>
                        <td><?php echo $rows['mobile']; ?></td>
                        <td><?php echo $rows['city']; ?></td>
                    </tr>

        <?php
                }
            }
        }
        ?>


    </table>
    <br>
    <section>
        <form onclick="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div>
                <label for="aadhar" style="font-weight: bold;">Enter Aadhar Number To See Your Donation Status :</label>
                <input type="text" id="aadhar" name="aadhar" required>
                <input type="submit" name="search" value="Search" required>
            </div>
            <table class="tab" align="center" border="2px" style="width: 600px; line-height:40px">
                <tr>
                    <th colspan="11" style="margin-left: 40%;">
                        <h2>Donation Status</h2>
                    </th>
                </tr>
                <t>
                    <th>Aadhar Num</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Donate To</th>
                    <th>Area</th>
                    <th colspan="7">Picture</th>
                </t>
                <?php
                include './connection.php';
                if (isset($_POST['search'])) {
                    $aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
                    // $status = mysqli_real_escape_string($conn, $_POST['status']);

                    $check = "Select * from goods where aadhar='$aadhar'";
                    $checkquery = mysqli_query($conn, $check);
                    $checkcount = mysqli_num_rows($checkquery);

                    $query22 = "select * from dondet where aadhar='$aadhar'";
                    $result2 = mysqli_query($conn, $query22);

                    if ($checkcount) {
                        while ($rows = mysqli_fetch_assoc($result2)) {
                ?>
                            <tr>
                                <td style="color: red;"><?php echo $rows['aadhar']; ?></td>
                                <td><?php echo $rows['product']; ?></td>
                                <td><?php echo $rows['quan']; ?></td>
                                <td><?php echo $rows['donate']; ?></td>
                                <td><?php echo $rows['area']; ?></td>
                                <td class="pic"><img src="<?php echo $rows['file'];?>"></td>

                            </tr>
                <?php
                        }
                    }
                }

                ?>
            </table>
        </form>
    </section>
    <script src="./admin.js"></script>
</body>

</html>