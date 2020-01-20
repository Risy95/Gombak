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
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
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

    $sql="INSERT INTO tagok (felhasznalonev, jelszo, keresztnev, vezeteknev, email, reg_datum)
VALUES ('$uname', '$passwd', '$fname', '$lname', '$email', now())";
    if (!mysqli_query($connection,$sql))
    {
        die('Error: ' . mysqli_error($connection));
    }

    $data['success'] = true;
    $data['message'] = 'Successful registration!';
}
echo json_encode($data);

mysqli_close($connection);