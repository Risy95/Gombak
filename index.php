<? xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

    <title>Gombások</title>
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
    <link type="text/css" rel="stylesheet" href="css/1.css" />
<!--    <link rel="shortcut icon" href="http://gombak.000webhostapp.com/kepek/gyapjas4.jpg" type="image/x-icon"/>-->
    <link rel="shortcut icon" href="kepek/gyapjas4.jpg" type="image/x-icon"/>

</head>
<body>

<?php ////////////////////////////////////////////////////////////SESSION
session_start();
?>

<!--<hr class="tb"/>-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

    <!-- Brand -->
    <a class="navbar-brand" href="../Gombasok">Gombások</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu" href="kepek">Képek</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="fajtak">Fajták</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="szabalyok">Szabályok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="rolunk">Rólunk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="logout.php?pn=00"><img src="kepek/logout.png" alt="kijelentkezés" height="45"/></a>
            </li>
        </ul>
    </div>
</nav>



<div class="container-fluid">
  <br /><hr /><br />

    <?php

    ////////////////////////////////////

    include "db_config.php";

    @$p=$_GET["code"];
    if(!empty($p)) {
        $sql = "SELECT id_tag FROM tagok where id_tag=$p";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {

            $sql = "UPDATE tagok SET allapot=1 WHERE id_tag=$p";
            if (!mysqli_query($conn, $sql)) {
                echo "Hiba történt az aktiválás folyamán.<br>";
                die('Error: ' . mysqli_error($conn));
            }
            echo '<h1>Felhasználó aktiválva</h1><br><hr><br>';

        }
    }

    /*if (!isset($_SESSION["log"]) || empty($_SESSION["log"])) {
        unset($_SESSION["log"]);
        echo "Nincs bejelentkezve.<br><hr><br>";

    } else {
        echo "Be van jelentkezve.<br><hr><br>";
    }*/



    ////////////////////////////////////

    ?>

  <div><h2>                                                       <!--  szöveg  -->
  Üdvözlöm! Ha szeretne többet megtudni a gombákról, akkor jó helyen jár! </h2>
  <br />
  <h3 class="imp">A gomba kiváló étel lehet, ha tudjuk, melyek fogyaszthatóak.</h3>
      <div class="row">
          <div class="col-sm-6 col-lg-3">
              <acronym title="Csiperke"><img class="good" alt="csiperke1" src="kepek/csiperke1.jpg" height="150"/></acronym>
          </div>
          <div class="col-sm-6 col-lg-3">
              <acronym title="Déli tőkegomba"><img class="good" alt="delitoke1" src="kepek/delitoke1.jpg" height="150"/></acronym>
          </div>
          <div class="col-sm-6 col-lg-3">
              <acronym title="Csoportos pereszke"><img class="good" alt="csoppereszke1" src="kepek/csoppereszke1.jpg" height="150"/></acronym>
          </div>
          <div class="col-sm-6 col-lg-3">
              <acronym title="Gyapjas tintagomba"><img class="good" alt="gyapjas4" src="kepek/gyapjas4.jpg" height="150"/></acronym>
          </div>
      </div>
  <p>Nagyon sokan nincsenek tisztában azzal, hogy rengeteg fajta gomba létezik. Emellet, sokan nem tudják, hogy vannak
   olyan fajták, melyeket jóízűen el lehet fogyasztani, és sok helyen igen közkedveltek. Persze vannak
   mérgező fajták, melyekkel vigyáznunk kell, és nem mindegyik jó izű. Viszont, az én célom az, hogy bemutassam
   a különböző fajtákat, és megmutassan, melyeket érdemes fogyasztani.</p>
  <h3 class="imp">Soha ne fogyasszunk olyan gombát, amelyet nem azonosítottunk!</h3>

      <div class="row">
          <div class="col-sm-6 col-lg-3">
              <acronym title="Légyölő galóca"><img class="bad" alt="legyolo1" src="kepek/legyolo1.jpg" height="150"/></acronym>
          </div>
          <div class="col-sm-6 col-lg-3">
              <acronym title="Gyilkos galóca"><img class="bad" alt="gyilkos1" src="kepek/gyilkos1.jpg" height="150"/></acronym>
          </div>
          <div class="col-sm-6 col-lg-3">
              <acronym title="Párducgalóca"><img class="bad" alt="parducgaloca1" src="kepek/parducgaloca1.jpg" height="150"/></acronym>
          </div>
          <div class="col-sm-6 col-lg-3">
              <acronym title="Hánytató galambgomba"><img class="bad" alt="hanytato1" src="kepek/hanytato1.jpg" height="150"/></acronym>
          </div>
      </div>
  <p>Természetesen, ha például valakitől kapunk gombát, akiben megbízunk, és ő tudja, hogy fogyasztható, akkor rendben van.
   Ha viszont mi magunk szedtük, nem elég az, hogy "talán ilyen fajta", lehetnek más, nagyon hasonló gombák is.</p>
   <p>A gombagyűjtésnek vannak bizonyos szabályai, például, ha azt akarjuk, hogy legközelebb is teremjen gomba egy bizonyos
   helyen, akkor nem szabad begyűjteni az összeset, mindig hagyjunk ott valamennyit. Ne szedjük le az öreg, vagy a túl fiatal
   példányokat. A fiatallal érdemes várni, a túl öregeket pedig gyakran már nem éri meg elfogyasztani. Azt is figyelembe kell
   venni, hogy milyen helyen terem a gomba. Például ne szedjünk olyan területről, amely vegyszerrel volt kezelve, vagy olyan
   helyekről, ahol különböző szennyeződések lehetnek, például kipufogógáz. Egyéb információkat a gombagyűjtésről, és az 
   elkészítésről a <a class="imp" href="szabalyok/">Szabályok</a> menüpont alatt találhat, ezekről is érdemes olvasni.</p>
   <p>A fenti <a class="imp" href="kepek/">Képek</a> menüre kattintva
   rengeteg képet láthat különböző fajta gombákról, és ha talált gombát,
   de nem tudja, milyen fajta, a képek segítségével könnyebben azonosíthatja.</p>
  <p>Ha információra van szüksége bizonyos fajta gombáról, a fenti <a class="imp" href="fajtak/">Fajták</a>
   menüre kattintva elolvashatja, mikor és hol lehet általában megtalálni, hogy fogyasztható-e, és egyéb
   információkat.</p>
   <p>Mindig örülök, amikor valahol meglátok egy ízletes fajta gombát, szívesen elkészítem, vagy valaki más a családból,
   és aztán jót eszünk belőle. Több féle módon el lehet készíteni, sok helyen lehet találni gombás recepteket.
   <a class="imp" href="http://www.mindmegette.hu/csiperke-a-szuperelelmiszer-48523">Itt</a> egy példa arra, milyen jó a
   csiperke. Remélem, minél többen megszeretik a gombákat!</p>
  </div>
  <br />
  <?php
    echo date("Y.m.d.");
  ?>
  <hr /><br />
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="javascript/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
