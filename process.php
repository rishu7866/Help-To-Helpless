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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        h1 {
            font-weight: bold;
            font-size: 55px;
            color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./mm.php">Home</a>
        <li class="nav-item">
            <a class="nav-link" onclick="logout()" href="./logout.php"> <img src="./arrow-right-from-bracket-solid.svg" style="width: 12px;"> Logout</a>
        </li>
    </nav>
    <h1>UNDER PROCESS SORRY FOR INCONVINIOUS</h1>
    <script src="./admin.js"></script>
</body>

</html>