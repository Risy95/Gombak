<?php
include "functions.php";
@$idB=$_POST['id'];
if(!empty($_GET['db']))
$db=$_GET['db'];
$len=strlen($idB);
//var_dump($idB);
//echo substr($idB,$len-1,$len-1);
switch(substr($idB,$len-1,$len-1)){
    case '2': $id=substr($idB,0,$len-2); form($id, $db); break;
    case '1': $id=substr($idB,0,$len-2); delete($id, $db); break;
    default:  $id=""; form($id, $db);
}
echo "<a href=$db>Vissza</a>";


