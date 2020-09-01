<?php

include "db_config.php";

session_start();

unset($_SESSION["log"]);

$pn=$_GET["pn"];

switch($pn)
{
    default:$page="../";break;
    case 00:$page="../";break;
    case 01:$page="fajtak";break;
    case 02:$page="szabalyok";break;
    case 03:$page="rolunk";break;
    case 04:$page="profil";break;
    case 10:$page="admin";break;
}

header("Location:$page");