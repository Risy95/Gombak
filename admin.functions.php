<?php

function form($id, $db)
{
    include "../db_config.php";
    $nev ="";
    $lnev="";
    $kod="";
    $fogy="";
    $leir="";
    $fnev ="";
    $jelszo="";
    $vnev ="";
    $knev ="";
    $email="";
    $all="";
    if($id!="")
    {
        if($db=="fajok")
        {
            $sql = "SELECT id_faj, faj_nev, latin_nev, kod, fogyaszthatosag, leiras FROM fajok WHERE id_faj='$id'";
        }
        elseif($db=="tagok")
        {
            $sql = "SELECT id_tag, felhasznalonev, jelszo, vezeteknev, keresztnev, email, allapot FROM tagok WHERE id_tag='$id'";
        }
        mysqli_set_charset($conn, 'utf8');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {

            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            if (mysqli_num_rows($result) > 0) {
                if($db=="fajok") {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nev  = $row['faj_nev'];
                        $lnev= $row['latin_nev'];
                        $kod= $row['kod'];
                        $fogy= $row['fogyaszthatosag'];
                        $leir= $row['leiras'];
                    }
                }
                elseif($db=="tagok"){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $fnev = $row['felhasznalonev'];
                        $jelszo=$row['jelszo'];
                        $vnev =$row['vezeteknev'];
                        $knev =$row['keresztnev'];
                        $email =$row['email'];
                        $all=$row['allapot'];
                    }
                }
            } else {
                echo "No result!";
            }
            mysqli_close($conn);
        }
    }
    echo "<?xml version='1.0' encoding='UTF-8'?>
    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='hu' lang='hu'>
    <head>
        <meta charset='UTF-8'>
        <title>Admin - Gombások</title>
        <link type='text/css' rel='stylesheet' href='style1.css' />
    </head>
    <body>
        <form action='writeToDatabase.php?db=$db' method='post'>
        <input type='hidden' name='id' value='$id'/>";
    if($db=="fajok") {
        echo"<label for='fnev'>Faj magyar neve: </label><input type='text' name='fnev' id='fnev' value='$nev'/><br />
<label for='lnev'>Faj latin neve: </label><input type='text' name='lnev' id='lnev' value='$lnev'/><br />
<label for='kod'>Faj kódja: </label><input type='text' name='kod' id='kod' value='$kod'/><br />
<label for='fogy'>Faj fogyaszthatósága: </label><input type='text' name='fogy' id='fogy' value='$fogy'/><br />
<label for='leir'>Faj leírása: </label><input type='text' name='leir' id='leir' value='$leir'/><br />";
    }
    elseif($db=="tagok")
    {
        echo "<label for='fnev'>Felhasználónév: </label><input type='text' name='fnev' id='fnev' value='$fnev'/><br />
<label for='jelszo'>Jelszó: </label><input type='text' name='jelszo' id='jelszo' value='$jelszo'/><br />
<label for='vnev'>Vezetéknév: </label><input type='text' name='vnev' id='vnev' value='$vnev'/><br />
<label for='knev'>Keresztnév: </label><input type='text' name='knev' id='knev' value='$knev'/><br />
<label for='email'>E-mail: </label><input type='text' name='email' id='email' value='$email'/><br />
<label for='all'>Állapot: </label><input type='text' name='all' id='all' value='$all'/><br />";
    }
    echo    "<br /><input type='submit'>
        </form>
    </body>
</html>

    ";
}

function addNewOrUpdate($db)
{
    include "../db_config.php";
    $id=$_POST['id'];
    if ($db == "fajok")
    {
        $nev  = $_POST['fnev'];
        $lnev= $_POST['lnev'];
        $kod= $_POST['kod'];
        $fogy= $_POST['fogy'];
        $leir= $_POST['leir'];
        if($id=="")
        {
            $sql="INSERT INTO fajok (faj_nev, latin_nev, kod, fogyaszthatosag, leiras)
VALUES ('$nev', '$lnev', '$kod', '$fogy', '$leir')";
        }
        else{
            $sql="UPDATE fajok
SET faj_nev='$nev', latin_nev='$lnev', kod='$kod', fogyaszthatosag='$fogy', leiras='$leir'
WHERE id_faj='$id'";
        }
    }
    elseif ($db == "tagok")
    {
        $fnev= $_POST['fnev'];
        $jelszo= $_POST['jelszo'];
        $vnev= $_POST['vnev'];
        $knev= $_POST['knev'];
        $email= $_POST['email'];
        $all= $_POST['all'];
        if($id=="")
        {
            $sql="INSERT INTO tagok (felhasznalonev, jelszo, vezeteknev, keresztnev, email, reg_datum, allapot)
VALUES ('$fnev', '$jelszo', '$vnev', '$knev', '$email', now(), '$all')";
        }
        else{
            $sql="UPDATE tagok
SET felhasznalonev='$fnev', jelszo='$jelszo', vezeteknev='$vnev', keresztnev='$knev', email='$email', allapot='$all'
WHERE id_tag='$id'";
        }
    }
        mysqli_set_charset($conn, 'utf8');
        if (mysqli_connect_errno())
        {
            $message="Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else{

            if (!mysqli_query($conn,$sql))
            {
                die('Error: ' . mysqli_error($conn));
            }
            $message="Sikeresen hozzáadva.";
        }
        mysqli_close($conn);

    header("Location:$db");

}

function delete($id, $db)
{
    include "../db_config.php";
    if($db=="fajok")
    {
        $sql="DELETE FROM fajok WHERE id_faj='$id'";
    }
    elseif($db="tagok")
    {
        $sql="DELETE FROM tagok WHERE id_tag='$id'";
    }
    mysqli_set_charset($conn, 'utf8');
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
        if (!mysqli_query($conn,$sql))
        {
            die('Error: ' . mysqli_error($conn));
        }
        echo "Sikeresen eltávolítva.";
    }
    mysqli_close($conn);
    header("Location:$db");
}
