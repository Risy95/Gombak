<?php

include "db_config.php";

session_start();

unset($_SESSION["log"]);

header("Location:rolam");