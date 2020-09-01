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
        <link type="text/css" rel="stylesheet" href="../../css/1.css"/>
        <link type="text/css" rel="stylesheet" href="../admin.css"/>
        <!--    <link rel="shortcut icon" href="http://gombasok.000webhostapp.com/kepek/gyapjas4.jpg" type="image/x-icon"/>-->
        <link rel="shortcut icon" href="../../kepek/gyapjas4.jpg" type="image/x-icon"/>

    </head>
    <body>

    <?php ////////////////////////////////////////////////////////////SESSION
    session_start();

    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

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
                <a class="nav-link menu" href="">Felhasználók</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../fajok">Fajták</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../../logout.php?pn=10"><img src="../../kepek/logout.png" alt="kijelentkezés" height="45"/></a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container-fluid">
        <br><hr><br>
    <?php
    include "../../db_config.php";
    if (!$conn) {
        die("conn failed: " . mysqli_connect_error());
    }

    $sql = "SELECT id_tag, felhasznalonev, jelszo, vezeteknev, keresztnev, email, reg_datum, allapot FROM tagok";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {

        echo '<form action="../form.php?db=tagok" method="post"><button>Új felhasználó hozzáadása</button><table border="black"><tr><td>Felhasználónév</td><td>Jelszó</td><td>Vezetéknév</td><td>Keresztnév</td><td>E-mail</td><td>Dátum</td><td>Állapot</td></tr>';


        while($row = mysqli_fetch_assoc($result)) {

            $idB=$row["id_tag"];
            echo "<tr><td>".$row["felhasznalonev"]."</td><td>".$row["jelszo"]."</td><td>".$row["vezeteknev"]."</td><td>".$row["keresztnev"]."</td>";
            echo "<td>".$row["email"]."</td><td>".$row["reg_datum"]."</td><td>".$row["allapot"]."</td><td><button type='submit' name='id' value='$idB.2'>Változtatás</button></td><td><button type='submit' name='id' value='$idB.1'>Törlés</button></td></tr>";


        }


    }
    mysqli_close($conn);
    ?>
        </div>
</body>
</html>
