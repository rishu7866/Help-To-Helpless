<?php
include './session2.php';
include './connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./manage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Donator Manager Page</title>
</head>

<body class="bc">
    <!--                               Navigation Bar                                 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" onclick="logout()" href="./logout2.php">Logout</a>
        <div class="nav-item">
            <h1 style="color: red; font-size: 20PX; ">WELCOME TO VOLUNTEER LOGIN PAGE</h1>
        </div>

    </nav>
    <!-- ******************************************************** -->

    <!-- For search Form -->
    <section class="firstsec">
        <form method="post">
            <div>
                <label>Enter Your City to Proceed :</label>
                <input type="text" name="city">
                <input type="submit" name="sub" value="Search">
            </div>

        </form>
    </section>
    <!-- ************************************************************** -->

    <!-- for status -->

    <!-- **************************************************************** -->

    <!-- Table To print Search -->
    <table class="tab" align="center" border="2px" style="width: 600px; line-height:40px">
        <tr>
            <th colspan="12" style="margin-left: 40%;">
                <h2>Order Record</h2>
            </th>
        </tr>
        <t>
            <th>Name</th>
            <th class="mob">Mobile Number</th>
            <th>Email</th>
            <th>Products</th>
            <th>House Number</th>
            <th>City</th>
            <th>Dist</th>
            <th>Pin</th>
            <th>aadhar</th>
            <th>Quantity</th>
            <th colspan="13">File</th>

        </t>
        <?php
        // include "./connection.php";
        if (isset($_POST['sub'])) {
            $city = mysqli_real_escape_string($conn, $_POST['city']);

            $cityquery = "select * from vol where city='$city' ";
            $query = mysqli_query($conn, $cityquery);
            $citycount = mysqli_num_rows($query);
            $query2 = "select * from goods where city='$city'";
            $result = mysqli_query($conn, $query2);

            if ($citycount) {


                while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                    <tr>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['mobile']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['product']; ?></td>
                        <td><?php echo $rows['houseno']; ?></td>
                        <td><?php echo $rows['city']; ?></td>
                        <td><?php echo $rows['dist']; ?></td>
                        <td><?php echo $rows['pin']; ?></td>
                        <td style="color: red;"><?php echo $rows['aadhar']; ?></td>
                        <td><?php echo $rows['quantity']; ?></td>
                        <td class="pic"><img src="<?php echo $rows['file'];?>"></td>

                    </tr>

        <?php
                }
            }
        }
        ?>
    </table>
    <!-- ************************************************************************ -->

    <!-- Section Form Donation Status put -->
    <section style="margin-top: 2%;" class="container">
        <form onclick="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

            <div>
                <label for="aadhar">Aadhar</label>
                <input type="text" id="aadhar" name="aadhar" required>
                <label for="Product">Product</label>
                <input type="text" id="Product" name="product" required>
                <label for="Quantity">Quantity</label>
                <input type="text" id="Quantity" name="quan" required>
                <br>
                <label for="donate">Donate To</label>
                <input type="text" name="donate" id="donate" required>
                <label for="area">Area</label>
                <input type="text" name="area" id="area" required>
                <label for="file">Upload Pic</label>
                <input type="file" id="file" name="file" required> <br>
                <label>Status</label>
                <input type="radio" class="radio-button" name="status" value="ON" required>
                <label>ON</label>
                <input type="radio" class="radio-button" name="status" value="OFF">
                <label>OFF</label>
                <input type="submit" name="submit" required>
            </div>


        </form>
   
    <?php
    if (isset($_POST['submit'])) {
        $aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
        $product = mysqli_real_escape_string($conn, $_POST['product']);
        $quan = mysqli_real_escape_string($conn, $_POST['quan']);
        $donate = mysqli_real_escape_string($conn, $_POST['donate']);
        $area = mysqli_real_escape_string($conn, $_POST['area']);
        $file = mysqli_real_escape_string($conn, $_POST['file']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $status1query="UPDATE `goods` SET `Status`='[$status]' WHERE `aadhar`='$aadhar'";
        $statusup=mysqli_query($conn,$status1query);

        $insertquery22 = "insert into dondet(aadhar,product,quan,donate,area,file) values ('$aadhar','$product','$quan','$donate','$area','$file')";
        $iquery22 = mysqli_query($conn, $insertquery22);
        if ($iquery22 && $statusup) {
    ?>
            <script>
                alert("Inserted Successfully and status Updated");
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
     </section>
    <!-- *************************************************************************** -->
<script src="./admin.js"></script>
</body>

</html>