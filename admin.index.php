<? xml version = "1.0" encoding = "UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<head>
    <title>Admin - Gombások</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kovács Kristóf"/>
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="language" content="Hungarian"/>
    <meta name="googlebot" content="noindex, nofollow"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="HU"/>
    <meta name="MobileOptimized" content="width"/>
    <meta name="HandheldFriendly" content="true"/>
    <meta name="google" content="notranslate"/>
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../css/1.css"/>
    <link type="text/css" rel="stylesheet" href="admin.css"/>
    <!--    <link rel="shortcut icon" href="http://gombasok.000webhostapp.com/kepek/gyapjas4.jpg" type="image/x-icon"/>-->
    <link rel="shortcut icon" href="../kepek/gyapjas4.jpg" type="image/x-icon"/>

</head>
<body>
<?php
//////////////////////////////////// LOGIN


session_start();


include "../db_config.php";

if (!isset($_SESSION["log"]) || empty($_SESSION["log"])) {
    unset($_SESSION["log"]);
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <!-- Brand -->
    <a class="navbar-brand" href="..">Gombások</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        </ul>
    </div>
</nav>';
    echo '<h1>Adminisztrációhoz jelentkezzen be!</h1><br><br>';

    echo '<form method="post" name="login" action="login.php">

    <table border="0" align="center" width="600">
        <tr>
            <td align="right"><b>Felhasználónév:</b></td>
            <td align="left" colspan="2"><input type="text" name="usern" size="30"></td>
        </tr>

        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td align="right"><b>Jelszó:</b></td>
            <td align="left" colspan="2"><input type="password" name="passw" size="30"></td>
        </tr>

        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <input type="submit" name="sd" value="Log in">&nbsp;
                <input type="reset" name="rd" value="Cancel"></td>
        </tr>

    </table>
</form>';

} else {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <!-- Brand -->
    <a class="navbar-brand" href="..">Gombások</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu" href="tagok">Felhasználók</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="fajok">Fajták</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../logout.php?pn=10"><img src="../kepek/logout.png" alt="kijelentkezés" height="45"/></a>
            </li>
        </ul>
    </div>
</nav>';
}

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="../javascript/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
