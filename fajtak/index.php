<?php
declare(strict_types=1);
session_start();
?>

<? xml version = "1.0" encoding = "UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109701271-1"></script>
    <!--<script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-109701271-1');
        </script>-->

    <title>Fajták</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kovács Kristóf"/>
    <meta name="description" content="Egy webhely, ahol jobban meg lehet ismerni a gombákat"/>
    <meta name="keywords" content="gomba, ehető, mérgező, szabályok, gombagyűjtés, fajták,  "/>
    <meta name="robots" content="index, follow"/>
    <meta name="language" content="Hungarian"/>
    <meta name="googlebot" content="index, follow"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="HU"/>
    <meta name="MobileOptimized" content="width"/>
    <meta name="HandheldFriendly" content="true"/>
    <meta name="google" content="notranslate"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://gombasok.000webhostapp.com"/>
    <meta property="og:title" content="Gombások - Ismerje meg velünk a gombákat"/>
    <meta property="og:site_name" content="Gombások"/>
    <meta property="og:description" content="Tudjon meg többet a gombákról, hogy jóízűen elfogyaszthassa őket."/>
    <meta property="og:image:type" content="image/jpg"/>
    <!--    <meta property="og:image" content="http://gombak.000webhostapp.com/kepek/gyapjas4.jpg"/>-->
    <meta property="og:image:width" content="556"/>
    <meta property="og:image:height" content="720"/>
    <meta property="og:locale" content="hu_HU"/>
    <meta property="og:locale:alternate" content="en_US"/>
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../css/1.css"/>
    <!--    <link rel="shortcut icon" href="http://gombak.000webhostapp.com/kepek/gyapjas4.jpg" type="image/x-icon"/>-->
    <link rel="shortcut icon" href="../kepek/gyapjas4.jpg" type="image/x-icon"/>

</head>
<body>


<!--<hr class="tb"/>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <!-- Brand -->
    <a class="navbar-brand" href="../">Gombások</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu" href="../fajtak">Fajták</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../szabalyok">Szabályok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../rolunk">Rólunk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="../profil">Profil</a>
            </li>
                <?php
                if (!isset($_SESSION["log"]) || empty($_SESSION["log"])) {
                    unset($_SESSION["log"]);
                } else {
                    echo "<li class=\"nav-item\">
<a class=\"nav-link menu\" href=\"../logout.php?pn=01\">
<img src=\"../kepek/logout.png\" alt=\"kijelentkezés\" height=\"45\"/></a>
</li>";
                }
                ?>
        </ul>
    </div>
</nav>

<div class="container-fluid">

    <br><hr><br>



    </form>

    <?php
    define("SECRET", "@3eweHjdsdfuihjhjhj#VGVgggg!");
    require "../db_config.php";
    require "functions.php";
    require "Mobile_Detect.php";

    $detect = new Mobile_Detect;
    $device = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');

    $id_qr_code = 0;

    if (isset($_GET['qr'])) {
        $id_qr_code = (int)$_GET['qr'];
    }

    if (existsQrCode($id_qr_code)) {
        $ipAddress = getIpAddress();
        $userAgentString = $_SERVER['HTTP_USER_AGENT'];
        insertStatisticData($id_qr_code, $ipAddress, $device, $userAgentString);
        updateQrCodeView($id_qr_code);
        setcookie("scan", "yes", time() + 300);
        $bingo=getBingo();
        writeMessage($id_qr_code);
    }

    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Keresés: <input type=text" name="words" size="20"><br><br>
        <input type="submit" name="sb" value="Keresés">
        <input type="reset" name="rb" value="Mégsem"><br><br><hr><br>

    <?php

    $words = "";
    $words_array = [];
    if(empty($bingo))
    {

    if (isset($_POST['words'])) {
        $words = $_POST["words"];

        $words = trim($words);
        $words_temp = explode(" ", $words);

        $words_array = array_filter($words_temp);

        $words_array = array_values($words_array);

        for ($i = 0; $i < count($words_array); $i++) {

            $sql1 = "SELECT * FROM fajok WHERE faj_nev
			 LIKE '%$words_array[$i]%'";

            $result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));

            while ($record = mysqli_fetch_array($result))
                $bingo_temp[] = $record['id_faj'];

        }

        if (!empty($bingo_temp)) {

            $bingo_2 = array_unique($bingo_temp);
            sort($bingo_2);

            $total = count($bingo_2);
            $bingo = join(",", $bingo_2); // "1,2,3,4"

            $sql2 = "SELECT * FROM fajok f INNER JOIN kepek k ON (f.id_faj = k.id_faj)
		WHERE  f.id_faj IN ($bingo) ";
        }
        else
        {
            $sql2="SELECT * FROM fajok f INNER JOIN kepek k ON (f.id_faj = k.id_faj)";
            echo"Nincs találat";
        }
    }
    else{
        $sql2="SELECT * FROM fajok f INNER JOIN kepek k ON (f.id_faj = k.id_faj)";
    }
    }
    else $sql2="SELECT * FROM fajok f INNER JOIN kepek k ON (f.id_faj = k.id_faj)
		WHERE  f.id_faj IN ($bingo) ";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        $id=NULL;
        while ($record = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
            if($id!=NULL && $id!=$record["id_faj"]) echo "</div><br>";
            if($id!=$record["id_faj"])
            {
                $id=$record["id_faj"];
                $border="";
                switch($record["fogyaszthatosag"])
                {
                    case 0: $border="bad"; break;
                    case 1: $border="neutral"; break;
                    case 2: $border="good"; break;
                    case 3: $border="excellent"; break;
                }
                echo '<h2>'.$record["faj_nev"].' - '.$record["latin_nev"].'</h2>'.$record["leiras"].'
                <div class="row"><div class="col-sm-6 col-lg-3">
                <img class="'.$border.'" alt="'.$record["kep_nev"].'" src="../kepek/'.$record["kep_nev"].'" height="150"/></div>';
            }
            else
            {
                echo '<div class="col-sm-6 col-lg-3">
                <img class="'.$border.'" alt="'.$record["kep_nev"].'" src="../kepek/'.$record["kep_nev"].'" height="150"/></div>';
            }

        }

        echo "</div><br><hr>";

    ?>

    <div>
        <h2>Az oldal teljességének hiánya miatt, íme még egy kis információ:</h2>
        <br><br>
        <h2>Néhány ehető gombafaj:</h2>
        <ul>
            <li>ánizsszagú tölcsérgomba (Clitocybe odora)</li>
            <li>császárgomba (Amanita caesaera)</li>
            <li>kétspórás csiperke (Agaricus bisporus)</li>
            <li>csoportos tuskógomba (Armillaria tabescens)</li>
            <li>erdei csiperke (Agaricus silvaticus)</li>
            <li>erdőszéli csiperke (Agaricus arvensis)</li>
            <li>fenyőpereszke (Tricholoma terreum)</li>
            <li>fodros káposztagomba (Sparassis crispa)</li>
            <li>foltostönkű gyűrűspereszke (Tricholoma matsutake)</li>
            <li>földtoló galambgomba (Russula delica)</li>
            <li>francia szarvasgomba (Tuber melanosporum)</li>
            <li>gyapjas tintagomba (Coprinus comatus)</li>
            <li>ízletes vargánya (Boletus edulis)</li>
            <li>késői laskagomba (Pleurotus ostreatus)</li>
            <li>ízletes kucsmagomba (Morchella esculenta)</li>
            <li>lila tölcsérpereszke (Lepista nuda)</li>
            <li>májgomba (Fistulina hepatica)</li>
            <li>májusi pereszke (Calocybe gambosa)</li>
            <li>mezei csiperke ~ kerti csiperke (Agaricus campestris)</li>
            <li>mezei szegfűgomba (Marasmius oreades)</li>
            <li>mézszagú galambgomba (Russula melliolens)</li>
            <li>nagy őzlábgomba (Macrolepiota procera)</li>
            <li>nyári szarvasgomba (Tuber aestivum)</li>
            <li>nyomott tönkű csiperke (Agaricus spissicaulis)</li>
            <li>óriás csiperke (Agaricus augustus)</li>
            <li>óriás pöfeteg (Calvatia gigantea)</li>
            <li>ördögszekér-laskagomba (Pleurotus eryngii)</li>
            <li>sárga gerebengomba (Hydnum repandum)</li>
            <li>sárga gévagomba (Laetiporus sulphureus)</li>
            <li>sárga rókagomba (Cantharellus cibarius)</li>
            <li>sötét trombitagomba (Craterellus cornucopioides)</li>
            <li>szekszárdi csiperke (Agaricus litoralis)</li>
            <li>tölcséres rókagomba (Cantharellus tubaeformis)</li>
        </ul>
        <br/>
        <hr/>
        <br/>

        <h2>Néhány mérgező gombafaj:</h2>
        <ul>
            <li>Áltrifla</li>
            <li>Barna galóca</li>
            <li>Begöngyöltszélű cölöpgomba</li>
            <li>Bíbor galóca</li>
            <li>Büdös őzlábgomba</li>
            <li>Cifra korallgomba</li>
            <li>Fehér galóca</li>
            <li>Feketedő nedűgomba</li>
            <li>Fenolszagú csiperke</li>
            <li>Gyilkos galóca</li>
            <li>Hagymatönkű pókhálósgomba</li>
            <li>Hánytató galambgomba</li>
            <li>Hegyes badargomba</li>
            <li>Hegyeskalapú galóca</li>
            <li>Kígyógomba</li>
            <li>Kubai badargomba</li>
            <li>Légyölő galóca</li>
            <li>Nagy döggomba</li>
            <li>Párducgalóca</li>
            <li>Redős papsapkagomba</li>
            <li>Retekszagú kígyógomba</li>
            <li>Sárga galóca</li>
            <li>Sárga kénvirággomba</li>
            <li>Sátántinóru</li>
            <li>Tulipán csészegomba</li>
            <li>Tüskés őzlábgomba</li>
        </ul>
    </div>

    <br/>
    <hr/>
    <br/>

    <div>
        <acronym title="Csiperke"><img alt="Csiperke1" src="../kepek/csiperke1.jpg" height="200"/></acronym>
        <acronym title="Csiperke"><img alt="Csiperke2" src="../kepek/csiperke2.jpg" height="200"/></acronym>
        <acronym title="Csiperke"><img alt="Csiperke3" src="../kepek/csiperke3.jpg" height="200"/></acronym>
        <acronym title="Csiperke"><img alt="Csiperke4" src="../kepek/csiperke4.BMP" height="200"/></acronym>
        <acronym title="Csiperke"><img alt="Csiperke5" src="../kepek/csiperke5.jpg" height="200"/></acronym>
        <acronym title="Csiperke"><img alt="Csiperke6" src="../kepek/csiperke6.jpg" height="200"/></acronym>
        <acronym title="Csiperke"><img alt="Csiperke7" src="../kepek/csiperke7.jpg" height="200"/></acronym>
        <acronym title="Csoportos Pereszke"><img alt="Csoportos pereszke1" src="../kepek/csoppereszke1.jpg" height="200"/></acronym>
        <acronym title="Csoportos Pereszke"><img alt="Csoportos pereszke2" src="../kepek/csoppereszke2.jpg" height="200"/></acronym>
        <acronym title="Csoportos Pereszke"><img alt="Csoportos pereszke3" src="../kepek/csoppereszke3.jpg" height="200"/></acronym>
        <acronym title="Csoportos Pereszke"><img alt="Csoportos pereszke4" src="../kepek/csoppereszke4.JPG" height="200"/></acronym>
        <acronym title="Déli tőkegomba"><img alt="Déli tőkegomba1" src="../kepek/delitoke1.jpg" height="200"/></acronym>
        <acronym title="Déli tőkegomba"><img alt="Déli tőkegomba2" src="../kepek/delitoke2.jpg" height="200"/></acronym>
        <acronym title="Déli tőkegomba"><img alt="Déli tőkegomba3" src="../kepek/delitoke3.jpg" height="200"/></acronym>
        <acronym title="Déli tőkegomba"><img alt="Déli tőkegomba4" src="../kepek/delitoke4.jpg" height="200"/></acronym>
        <acronym title="Gyapjas tintagomba"><img alt="Gyapjas tintagomba1" src="../kepek/gyapjas1.jpg" height="200"/></acronym>
        <acronym title="Gyapjas tintagomba"><img alt="Gyapjas tintagomba2" src="../kepek/gyapjas2.jpg" height="200"/></acronym>
        <acronym title="Gyapjas tintagomba"><img alt="Gyapjas tintagomba3" src="../kepek/gyapjas3.jpg" height="200"/></acronym>
        <acronym title="Gyapjas tintagomba"><img alt="Gyapjas tintagomba4" src="../kepek/gyapjas4.jpg" height="200"/></acronym>
        <acronym title="Gyilkos galóca"><img alt="Gyilkos galóca1" src="../kepek/gyilkos1.jpg" height="200"/></acronym>
        <acronym title="Gyilkos galóca"><img alt="Gyilkos galóca2" src="../kepek/gyilkos2.jpg" height="200"/></acronym>
        <acronym title="Gyilkos galóca"><img alt="Gyilkos galóca3" src="../kepek/gyilkos3.jpg" height="200"/></acronym>
        <acronym title="Gyilkos galóca"><img alt="Gyilkos galóca4" src="../kepek/gyilkos4.jpg" height="200"/></acronym>
        <acronym title="Gyilkos galóca"><img alt="Gyilkos galóca5" src="../kepek/gyilkos5.jpg" height="200"/></acronym>
        <acronym title="Hánytató galambgomba"><img alt="Hánytató galambgomba1" src="../kepek/hanytato1.jpg" height="200"/></acronym>
        <acronym title="Hánytató galambgomba"><img alt="Hánytató galambgomba2" src="../kepek/hanytato2.jpg" height="200"/></acronym>
        <acronym title="Kerti tintagomba"><img alt="Kerti tintagomba1" src="../kepek/kerti1.jpg" height="200"/></acronym>
        <acronym title="Kerti tintagomba"><img alt="Kerti tintagomba2" src="../kepek/kerti2.jpg" height="200"/></acronym>
        <acronym title="Kerti tintagomba"><img alt="Kerti tintagomba3" src="../kepek/kerti3.jpg" height="200"/></acronym>
        <acronym title="Kerti tintagomba"><img alt="Kerti tintagomba4" src="../kepek/kerti4.jpg" height="200"/></acronym>
        <acronym title="Kerti tintagomba"><img alt="Kerti tintagomba5" src="../kepek/kerti5.jpg" height="200"/></acronym>
        <acronym title="Kerti tintagomba"><img alt="Kerti tintagomba6" src="../kepek/kerti6.jpg" height="200"/></acronym>
        <acronym title="Kerti tintagomba"><img alt="Kerti tintagomba7" src="../kepek/kerti7.jpg" height="200"/></acronym>
        <acronym title="Légyölő galóca"><img alt="Légyölő galóca1" src="../kepek/legyolo1.jpg" height="200"/></acronym>
        <acronym title="Légyölő galóca"><img alt="Légyölő galóca2" src="../kepek/legyolo2.jpg" height="200"/></acronym>
        <acronym title="Légyölő galóca"><img alt="Légyölő galóca3" src="../kepek/legyolo3.jpg" height="200"/></acronym>
        <acronym title="Párducgalóca"><img alt="Párducgalóca1" src="../kepek/parducgaloca1.jpg" height="200"/></acronym>
        <acronym title="Párducgalóca"><img alt="Párducgalóca2" src="../kepek/parducgaloca2.jpg" height="200"/></acronym>
        <acronym title="Párducgalóca"><img alt="Párducgalóca3" src="../kepek/parducgaloca3.jpg" height="200"/></acronym>
        <acronym title="Piruló galóca"><img alt="Piruló galóca1" src="../kepek/pirulo1.JPG" height="200"/></acronym>
        <acronym title="Piruló galóca"><img alt="Piruló galóca2" src="../kepek/pirulo2.jpg" height="200"/></acronym>
        <acronym title="Piruló galóca"><img alt="Piruló galóca3" src="../kepek/pirulo3.jpg" height="200"/></acronym>
        <acronym title="Pisztric"><img alt="Pisztric1" src="../kepek/pisztric1.jpg" height="200"/></acronym>
        <acronym title="Pisztric"><img alt="Pisztric2" src="../kepek/pisztric2.jpg" height="200"/></acronym>
        <acronym title="Pisztric"><img alt="Pisztric3" src="../kepek/pisztric3.jpg" height="200"/></acronym>
        <acronym title="Sárga rókagomba"><img alt="Sárga rókagomba1" src="../kepek/rokagomba1.jpg" height="200"/></acronym>
        <acronym title="Sárga rókagomba"><img alt="Sárga rókagomba2" src="../kepek/rokagomba2.jpg" height="200"/></acronym>
        <acronym title="Sárga rókagomba"><img alt="Sárga rókagomba3" src="../kepek/rokagomba3.jpg" height="200"/></acronym>
        <acronym title="Szemcsésnyelű fenyőtinóru"><img alt="Szemcsésnyelű fenyőtinóru1" src="../kepek/szemcsesnyelu1.jpg" height="200"/></acronym>
        <acronym title="Szemcsésnyelű fenyőtinóru"><img alt="Szemcsésnyelű fenyőtinóru2" src="../kepek/szemcsesnyelu2.jpg" height="200"/></acronym>
        <acronym title="Szemcsésnyelű fenyőtinóru"><img alt="Szemcsésnyelű fenyőtinóru3" src="../kepek/szemcsesnyelu3.JPG" height="200"/></acronym>

    </div>

    <br/><?php
    echo date("Y.m.d.");

    ?>
    <hr/>
    <br/>

</div>
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