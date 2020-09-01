<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "gombak");
$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
mysqli_query($conn, "SET NAMES utf8") or die (mysqli_error($conn));
mysqli_query($conn, "SET CHARACTER SET utf8") or die (mysqli_error($conn));
mysqli_query($conn, "SET COLLATION_connection='utf8_hungarian_ci'") or die (mysqli_error($conn));

