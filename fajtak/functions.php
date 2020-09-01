<?php
function getIpAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}


function insertStatisticData($id_qr_code, $ipAddress, $device, $userAgentString)
{
    global $conn;

    $sql = "INSERT INTO statisztika(id_qr_code, ip_address, device, user_agent_string, date)
            VALUES ('$id_qr_code','$ipAddress','$device','$userAgentString',now())";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

}

function updateQrCodeView($id_qr_code)
{

    global $conn;

    $sql = "UPDATE qr_kod SET szkennelve=szkennelve+1 WHERE id_qr_code = '$id_qr_code'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

}

function getBingo()
{
    global $conn;
    $sql="SELECT id_faj FROM qr_kod";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while ($record = mysqli_fetch_array($result)) $bingo_2[]=$record["id_faj"];
    return join(",", $bingo_2);
}

function writeMessage($id_qr_code)
{
    global $conn;
    $sql="SELECT helyes FROM qr_kod where id_qr_code=$id_qr_code";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    while ($record = mysqli_fetch_array($result))
    {
        if($record["helyes"]==1)echo "<h3>Gratulálok, helyesen válaszolt a kérdésre! Lent előkeretük a kérdésben szereplő gombákat.</h3><br>";
        else echo "<h3>Sajnos helytelen választ adott, de lent már láthatja is a kérdésben szereplő gombákat.</h3><br>";
    }
}

function existsQrCode($id_qr_code)
{
    global $conn;

    $sql = "SELECT id_qr_code FROM qr_kod WHERE id_qr_code='$id_qr_code'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function existsCookie()
{
    return isset($_COOKIE['scan']);
}


?>