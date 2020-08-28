<?php

include "../db_config.php";

session_start();

$un = mysqli_real_escape_string($conn, $_POST["usern"]);
$pw = mysqli_real_escape_string($conn, $_POST["passw"]);

$sql = "SELECT felhasznalonev, jelszo FROM tagok WHERE felhasznalonev='$un' AND allapot=2";
$query = mysqli_query($conn, $sql);
while($result = mysqli_fetch_array($query))
{
    if(!empty($pw) AND $result["jelszo"]==$pw)
    {
        echo "Sikeres bejelentkezés.";
        $_SESSION["log"]="in";
    }
}

header("Location:../admin");
