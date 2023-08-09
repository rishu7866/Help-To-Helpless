<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HtoH Registration</title>
  <link rel="icon" href="./icon.png">
  <link rel="stylesheet" href="registration.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="regg">
  <?php
  include './connection.php';
  if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    // $pass = password_hash($password, PASSWORD_BCRYPT);
    // $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $gmailquery = "select * from reg where email='$email'";
    $query = mysqli_query($conn, $gmailquery);
    $gmailcount = mysqli_num_rows($query);
    if ($gmailcount > 0) {
  ?>
      <script>
        alert("already exists");
      </script>
      <?php
    } else {


      if ($password === $cpassword) {
        $insertquery = "insert into reg(name,gender,mobile,email,password,cpassword) values ('$name','$gender','$mobile','$email','$password','$cpassword')";
        $iquery = mysqli_query($conn, $insertquery);
        if ($iquery) {
      ?>
          <script>
            alert("Inserted Successfully");
          </script>
        <?php
        } else {
        ?>
          <script>
            alert("Not Inserted");
          </script>
        <?php
        }
      } else {
        ?>
        <script>
          alert("Password not match");
        </script>
  <?php
      }
    }
  }
  ?>

  <!-- ************************************************************** -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h2 style="color: blue;">HtoH Registration Form</h2>


    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

      </ul>


      <div class="right">
        <a href="./logout.php"><img src="./arrow-right-from-bracket-solid.svg"></a>
      </div>
  </nav>

  <div class="var">
    <div class="welcome">
      <img src="./icon.png">
    </div>


    <div class="form-container">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="input-name">
          <i class="fa fa-user user"></i>
          <input type="text" onkeyup="textonly(this)" name="name" placeholder=" Name" class=" text-name" required>
          <input type="radio" class="radio-button" name="gender" value="Male" required> 
          <label>Male</label>
          <input type="radio" class="radio-button" name="gender" value="Female">  
          <label>Female</label><br></br>
          <i class="fa fa-mobile mobile"></i>
          <input type="text" onkeyup="numberonly(this)" maxlength="10" placeholder="Mobile_Number" name="mobile" class="text-name" required><br></br>

          <i class="fa fa-envelope email"></i>
          <input type="email" placeholder="Email" name="email" class="text-name" required><br><br>

          <i class="fa fa-lock lock"></i>
          <input type="password" placeholder="password" name="password" class="text-name" required><br><br>

          <i class="fa fa-lock lock"></i>
          <input type="password" placeholder=" confirm password" name="cpassword" class="text-name" required><br></br>

          <div class="arrow"></div>
          <input type="Checkbox" class="check-button" required>
          <label>I accept the terrms and condition</label> <br>
          <label class="al">Already Member<a href="./login.php">Click Here To Login</a></label>
          <br></br>
          <!-- <button type="submit">Submit</button> -->
          <input type="Submit" name="submit" class="button" value="Register" required>
        </div>



      </form>

    </div>
  </div>
  <script src="./admin.js"></script>
</body>

</html>