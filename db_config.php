<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "gombak");
$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
mysqli_query($connection, "SET NAMES utf8") or die (mysqli_error($connection));
mysqli_query($connection, "SET CHARACTER SET utf8") or die (mysqli_error($connection));
mysqli_query($connection, "SET COLLATION_CONNECTION='utf8_general_ci'") or die (mysqli_error($connection));