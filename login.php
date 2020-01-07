<?php

include "db_config.php";

session_start();

$un = mysqli_real_escape_string($connection, $_POST["usern"]);
$pw = mysqli_real_escape_string($connection, $_POST["passw"]);

$sql = "SELECT felhasznalonev, jelszo FROM tagok WHERE felhasznalonev='$un'";
$query = mysqli_query($connection, $sql);
while($result = mysqli_fetch_array($query))
{
    if(!empty($pw) AND $result["jelszo"]==$pw)
    {
        echo "Sikeres bejelentkezés.";
        $_SESSION["log"]="in";
    }
}

header("Location:rolam");
