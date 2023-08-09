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
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>HtoH Home Page</title>
    <link rel="icon" href="./icon.png">
</head>

<body>
    <div id="loaderr"></div>
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
                    <a class="nav-link disabled" href="./don.php">Money Donation Page</a>
                </li>
                <li class="nav-item" onclick="logout(this);">
                    <a class="nav-link disabled" href="./vlogin.php">Login As VOLUNTEER</a>
                </li>
            </ul>

        </div>
        <h1 style="color:slategrey;">Help to Helpless</h1>
        <div class="right" >
            <a  href="./logout.php" onclick="logout()"><img src="./arrow-right-from-bracket-solid.svg"></a>
        </div>
    </nav>

    <div class="to">
        <p>“We make a living by what we get, but we make a life by what we give.”</p>

    </div>
    <div class="row">
        <div class="column">
            <img src="./donation (2).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="./donation (3).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="./donation (4).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="./donation(5).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="./next (1).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="./next (2).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="./next (3).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
        <div class="column">
            <img src="./next (4).jpg" alt="Donation pic" style="width:100%" onclick="myFunction(this);">
        </div>
    </div>
    <div class="container">
        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
        <img id="expandedImg" style="width:100%">
        <div id="imgtext"></div>
    </div>

    <script>
        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }
    </script>

    <script>
        var loader = document.getElementById("loaderr");
        window.addEventListener("load", function() {
            loader.style.display = "none";
        })
    </script>
<script src="./admin.js"></script>
</body>

</html>