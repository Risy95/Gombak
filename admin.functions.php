<?php

function form($id, $db)
{
    include "../db_config.php";
    if($db=="fajok") {
        $sql = "SELECT id_faj, faj_nev, latin_nev, elofordulas, fogyaszthatosag FROM fajok WHERE id_faj='$id'";
    }
    elseif($db=="tagok"){
        $sql = "SELECT id_tag, felhasznalonev, jelszo, vezeteknev, keresztnev, email, allapot FROM tagok WHERE id_tag='$id'";
    }
    if($id!="")
    {
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
                        $elof= $row['elofordulas'];
                        $fogy= $row['fogyaszthatosag'];
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
<label for='elof'>Faj előfordulása: </label><input type='text' name='elof' id='elof' value='$elof'/><br />
<label for='fogy'>Faj fogyaszthatósága: </label><input type='text' name='fogy' id='fogy' value='$fogy'/><br />";
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
        $elof= $_POST['elof'];
        $fogy= $_POST['fogy'];
        if($id=="")
        {
            $sql="INSERT INTO fajok (faj_nev, latin_nev, elofordulas, fogyaszthatosag)
VALUES ('$nev', '$lnev', '$elof', '$fogy')";
        }
        else{
            $sql="UPDATE fajok
SET faj_nev='$nev', latin_nev='$lnev', elofordulas='$elof', fogyaszthatosag='$fogy'
WHERE id_faj='$id'";
        }
    }
    elseif ($db == "tagok")
    {
        $fnev= $_POST['$fnev'];
        $jelszo= $_POST['$jelszo'];
        $vnev= $_POST['vnev'];
        $knev= $_POST['knev'];
        $email= $_POST['$email'];
        $all= $_POST['$all'];
        if($id=="")
        {
            $sql="INSERT INTO tagok (felhasznalonev, jelszo, vezeteknev, keresztnev, email, allapot)
VALUES ('$fnev', '$jelszo', '$vnev', '$knev', '$email', '$all')";
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
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else{

            if (!mysqli_query($conn,$sql))
            {
                die('Error: ' . mysqli_error($conn));
            }
            echo "Successfully added to the database.";
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
        echo "Successfully removed from the database.";
    }
    mysqli_close($conn);
    header("Location:$db");
}
