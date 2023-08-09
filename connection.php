<?php
$server="localhost";
$user="root";
$password="";
$db="htoh";

$conn =mysqli_connect($server,$user,$password,$db);
if($conn)
{
    ?>
    <script>
        // alert("Connection Successful");
    </script>
    <?php
}else{
    ?>
    <script>
        alert("Connection failed");
    </script>
    <?php
}
?>