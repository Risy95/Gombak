<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
</head>
<body>
<?php
define("SECRET", "@3eweHjdsdfuihjhjhj#VGVgggg!");
require('../db_config.php');

$words = "";
$words_array = [];

if (isset($_POST['words']))
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

    $sql2 = "SELECT * FROM fajok
		WHERE  id_faj IN ($bingo) ";

    $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

    echo "Total search number: $total<hr><br>";

    $i = 1;

    while ($record = mysqli_fetch_array($result2, MYSQLI_BOTH)) {
        echo "<b>$i.</b> $record[faj_nev] $record[latin_nev], $record[leiras]<br>";
        $i++;
    }

    echo "<br><hr>";

} else {
    echo "No data!";
}

?>
</body>
</html>