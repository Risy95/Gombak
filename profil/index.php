<? /* xml version = "1.0" encoding = "UTF-8"*/ ?>
<!DOCTYPE html PUBLIC>
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

    <style>
        label {
            display: block;
        }
        .error {
            color: #f00;
        }
    </style>
    <title>Rólunk</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="../css/1.css"/>
    <!--    <link rel="shortcut icon" href="http://gombak.000webhostapp.com/kepek/gyapjas4.jpg" type="image/x-icon"/>-->
    <link rel="shortcut icon" href="../kepek/gyapjas4.jpg" type="image/x-icon"/>

</head>
<body>
<?php
session_start();
?>

    <script
        src="../javascript/jquery-3.4.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

    <script style="text/javascript">

        var errors = false;

        function checkForm() {

            errors = false;

            if ($.trim($("#uname").val()) == "") {
                $("#uname_error").text("Írja be a kívánt felhasználónevet.");
                errors = true;
            }
            else {
                $("#uname_error").text("");
            }

            var passwValue = $.trim($("#passw").val());
            if (passwValue == "") {
                $("#passw_error").text("Írjon be jelszavat.");
                errors = true;
            }
            else {
                $("#passw_error").text("");
            }

            var passwReValue = $.trim($("#passwRe").val());
            if (passwReValue == "") {
                $("#passwRe_error").text("Írja be ismét a jelszavat.");
                errors = true;
            }
            else {
                $("#passwRe_error").text("");
            }

            if (passwReValue !== passwValue) {
                $("#passwRe_error").text("A jelszavaknak egyezniük kell.");
                errors = true;
            }
            else {
                $("#passwRe_error").text("");
            }

            var emailValue = $.trim($("#email").val());
            if (emailValue == "") {
                $("#email_error").text("Írja be az e-mail címét.");
                errors = true;
            }
            else if (emailValue.length >= 50) {
                $("#email_error").text("Az e-mail cím legfeljebb 50 karakter lehet.");
                errors = true;
            }
            else if (emailValue.indexOf('@') < 0 || emailValue.indexOf('.') < 0) {
                $("#email_error").text("Érvénytelen e-mail cím.");
                errors = true;
            } else {
                $("#email_error").text("");
            }

            if ($.trim($("#fname").val()) == "") {
                $("#fname_error").text("Írja be a keresztnevét.");
                errors = true;
            }
            else {
                $("#fname_error").text("");
            }

            if ($.trim($("#lname").val()) == "") {
                $("#lname_error").text("Írja be a vezetéknevét.");
                errors = true;
            }
            else {
                $("#lname_error").text("");
            }

        }

        $(document).ready(function () {

            $("#reg").click(function (e) {
                e.preventDefault();
                checkForm();


                if (errors == false) {
                    var formData = $("#register").serialize();
                    console.log(formData);

                    $.ajax({
                            type: 'POST',
                            url: 'register.php',
                            data: formData,
                            dataType: 'json',
                            encode: true
                        })
                        .done(function (data) {

                            if (data.success == true) {
                                $("input").val("");
                                $(".error").text("");
                                alert(data.message);
                            }
                            else {
                                alert('Failed to register!');
                                console.log(data);
                                $('#email_error').text(data.errors['email']);
                                $('#fname_error').text(data.errors['fname']);
                                $('#lname_error').text(data.errors['lname']);
                                $('#address_error').text(data.errors['address']);
                                $('#occup_error').text(data.errors['occup']);
                            }


                        });

                }


            });

        });

    </script>

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
                    <a class="nav-link menu" href="">Profil</a>
                </li>
                <?php
                if (!isset($_SESSION["log"]) || empty($_SESSION["log"])) {
                    unset($_SESSION["log"]);
                } else {
                    echo "<li class=\"nav-item\">
<a class=\"nav-link menu\" href=\"../logout.php?pn=04\">
<img src=\"../kepek/logout.png\" alt=\"Kijelentkezés\" height=\"45\"/></a>
</li>";
                }
                ?>
            </ul>
        </div>
    </nav>
<div class="container-fluid">
    <br/>
    <hr/>
    <br/>

    <?php

    ////////////////////////////////////       LOGIN/OUT

    include "../db_config.php";

    if (!isset($_SESSION["log"]) || empty($_SESSION["log"])) {
        unset($_SESSION["log"]);

        echo '<form method="post" name="login" action="../login.php">

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
                    <input type="submit" name="sd" value="Bejelentkezés">&nbsp;
                    <input type="reset" name="rd" value="Mégsem"></td>
            </tr>

        </table>
        </form>
        <br>
        <hr>
        <br>';

        echo '<form method="post" name="register" action="register.php" id="register">

        <table border="0" align="center" width="600">
            <tr>
                <td align="right"><b>Felhasználónév:</b></td>
                <td align="left" colspan="2"><input type="text" name="username" size="30" id="uname"> *</td>
            </tr>

            <tr>
                <td colspan="3" align="center" class="error" id="uname_error"></td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td align="right"><b>Jelszó:</b></td>
                <td align="left" colspan="2"><input type="password" name="password" size="30" id="passw"> *</td>
            </tr>

            <tr>
                <td colspan="3" align="center" class="error" id="passw_error"></td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td align="right"><b>Jelszó ismét:</b></td>
                <td align="left" colspan="2"><input type="password" name="passwordRe" size="30" id="passwRe"> *</td>
            </tr>

            <tr>
                <td colspan="3" align="center" class="error" id="passwRe_error"></td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td align="right"><b>Keresztnév:</b></td>
                <td align="left" colspan="2"><input type="text" name="firstname" size="30" id="fname"> *</td>
            </tr>

            <tr>
                <td colspan="3" align="center" class="error" id="fname_error"></td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td align="right"><b>Vezetéknév:</b></td>
                <td align="left" colspan="2"><input type="text" name="lastname" size="30" id="lname"> *</td>
            </tr>

            <tr>
                <td colspan="3" align="center" class="error" id="lname_error"></td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td align="right"><b>E-mail:</b></td>
                <td align="left" colspan="2"><input type="email" name="email" size="30" id="email"> *</td>
            </tr>

            <tr>
                <td colspan="3" align="center" class="error" id="email_error"></td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td align="right" width="150"><b>Captcha kód:</b></td>
                <td align="left" width="50"><input type="text" name="code" size="8"></td>
                <td align="left" width="250"><img src="captcha.php" border="0" alt="code"> *</td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td align="left" colspan="2">
                    <button id="reg">Regisztrálok</button>
            </tr>

        </table>
        </form>
        <br>';



    }
    else
    {
        echo'<h2>Üdvözöljük!</h2>
<h4>Ha még nem tette, töltse le az android alkalmazásunkat!</h4>
<p>Ne felejtse el áttanulmányozni a gombagyűjtés szabályait, és legyen mindig óvatos.
 Jó gombászatot!</p>

        ';
    }

    ?>

    <?php

    if (isset($_GET['p']))
        $p = $_GET['p'];
    else
        $p = "";

    if ($p == "1")
        echo "<div class=\"imp\">Error in the security code!</div>";
    ?>


<br><?php
    echo date("Y.m.d.");

    ?>
    <hr>
    <br>
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