<?php
session_start();

include './connection.php';
if (isset($_POST['login'])) {

    $user    = $_POST['user'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "select 'user', 'password' from vol
    where user='$user' and password='$password'");

    $user_matched = mysqli_num_rows($result);

    if ($user_matched > 0) {

        $_SESSION["user"] = $user;
        header("location: manage.php");
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
    <title>Login As Volunteer</title>
    <link rel="stylesheet" href="./vlogin.css">
    <link rel="icon" href="./icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./volunteer.php">Register Here</a>
        <div class="nav-item">
            <h1 style="color: red; font-size: 25PX; ">WELCOME TO VOLUNTEER LOGIN PAGE</h1>
        </div>
    </nav>
    <div class="vlogin-form">
        <!-- action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" -->
            <form action="./vlogin.php" method="post">
                <p>User Name</p>
                <input type="text" name="user">
                <p>Password</p>
                <input type="password" name="password" required>
                <br></br>
                <input type="submit" name="login" value="Login">
            </form>
    </div>
</body>

</html>