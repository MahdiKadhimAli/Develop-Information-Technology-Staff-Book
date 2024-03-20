<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "database_college";
    //create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM db WHERE id=$id";
    $connection->query($sql);
}
header("location: Dashboard.php");
exit;
