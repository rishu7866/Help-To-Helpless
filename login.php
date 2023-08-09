<?php
session_start();

include './connection.php';
if (isset($_POST['login'])) {

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "select 'email', 'password' from reg
    where email='$email' and password='$password'");

    $user_matched = mysqli_num_rows($result);

    if ($user_matched > 0) {

        $_SESSION["email"] = $email;
        header("location: mm.php");
    } else {
?>
        <script>
            alert("Email Id or Password Not Match");
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help to Helpless</title>
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="icon" rel="icon" href="../php/icon.png">
</head>

<body class="bod">
    <nav class="welcome">
        <img src="./icon.png">
        <div class="center">
            <h1>Welcome To Help to Helpless Login Page</h1>
        </div>
    </nav>
    <div class="login-form">
        <!-- action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" -->
        <form action="./login.php" method="post">
            <p>User Name</p>
            <input type="text" name="email" >
            <p>Password</p>
            <input type="password" name="password" required>
            <br></br>
            <div class="check">
                <label>Don't Have Account <a href="./Registration.php">Click Here</a></label>
            </div>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
    <!-- <footer id="adminfooter">
        <p>ADMIN :
            <a href="https://www.facebook.com/rishu.rj67/">RISHABH KUMAR</a>
        </p>
        <h3>Mail :- <a href="mailto:dhounidurgaasthan@gmail.com">dhounidurgaasthan@gmail.com</a></h3>
    </footer> -->
</body>

</html>