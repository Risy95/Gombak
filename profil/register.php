<?php

include "../db_config.php";

$uname=$_POST["username"];
$passwd=$_POST["password"];
$passwdRe=$_POST["passwordRe"];
$fname=$_POST["firstname"];
$lname=$_POST["lastname"];
$email=$_POST["email"];

$errors['username']='';
$errors['password']='';
$errors['passwordRe']='';
$errors['firstname']='';
$errors['lastname']='';
$errors['email']='';
$data= array();
$a=0;

if (empty($email)){
    $errors['email']='E-mail address is required.'; $a++;}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email']='Invalid e-mail address.'; $a++;
}else{
    $sql="SELECT email FROM tagok";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            if($row['email']==$email){
                $errors['email']='E-mail address already in use.'; $a++;
            }
        }
    }
}

if (empty($uname)){
    $errors['uname']='Írja be a kívánt felhasználónevet.'; $a++;}

if (empty($fname)){
    $errors['fname']='Írja be a keresztnevét.'; $a++;}

if (empty($lname)){
    $errors['lname']='Írja be a vezetéknevét.'; $a++;}

if (empty($passwd)){
    $errors['passwd']='Írjon be jelszavat.'; $a++;}

if (empty($passwdRe)){
    $errors['passwdRe']='Írja be mégegyszer a jelszavat. '; $a++;}

if ($passwd!==$passwdRe){
    $errors['passwdRe']='A két jelszónak egyeznie kell.'; $a++;}

if ($a>0) {

    $data['success'] = false;
    $data['errors']  = $errors;
} else {

    $sql="SELECT id_tag FROM tagok";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        $a=true;
        while ($a) {
            $id=mt_rand(10000,99999);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["id_tag"]==$id){$a=true;break;}
                else $a=false;
            }
        }
    }

    $sql="INSERT INTO tagok (id_tag, felhasznalonev, jelszo, keresztnev, vezeteknev, email, reg_datum)
VALUES ('$id','$uname', '$passwd', '$fname', '$lname', '$email', now())";
    if (!mysqli_query($conn,$sql))
    {
        die('Error: ' . mysqli_error($conn));
    }

    $header = "From: $fname $lname <$email>\n";
    $header .= "X-Sender: <$email>\n";
    $header .= "X-Mailer: PHP\n";
    $header .= "X-Priority: 1\n";
    $header .= "Return-Path: <$email>\n";
    $header .= "Content-Type: text/html; charset=UTF-8\n";

    $message = "<h1>Sikeres regisztráció a Gombások webhelyen</h1>";
    $message .= "<h2>Az aktiváláshoz kattintson az alábbi linkre:</h2>";
    $message .= "<h2><a href='http://localhost/Gombasok/index.php?code=$id'></a></h2>";
    $to = "localhost";
    $subject = "Felhasználó aktiválás";

    //mail($to,$subject,$message);

    if (mail($to, $subject, $message, $header))
    $data['success'] = true;
    $data['message'] = 'Sikeres regisztráció, elküldtük az aktiváláshoz szükséges e-mailt';
}
echo json_encode($data);

mysqli_close($conn);