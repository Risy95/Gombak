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

if($passwd==$passwdRe)
{
    $sql="INSERT INTO tagok (felhasznalonev, jelszo, keresztnev, vezeteknev, email, reg_datum)
VALUES ('$uname', '$passwd', '$fname', '$lname', '$email', now())";
//$query = mysqli_query($connection, $sql);
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
}
header("Location:../rolam");

if (empty($email)){
    $errors['email']='E-mail address is required.'; $a++;}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email']='Invalid e-mail address.'; $a++;
}else{
    $sqli="SELECT e_mail FROM registrations";
    $result = mysqli_query($con, $sqli) or die(mysqli_error($con));
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            if($row['e_mail']==$email){
                $errors['email']='E-mail address already in use.'; $a++;
            }
        }
    }
}

//////

///////

////////




$con=mysqli_connect("localhost","root","","mandatory");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (empty($email)){
    $errors['email']='E-mail address is required.'; $a++;}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email']='Invalid e-mail address.'; $a++;
}else{
    $sqli="SELECT e_mail FROM registrations";
    $result = mysqli_query($con, $sqli) or die(mysqli_error($con));
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            if($row['e_mail']==$email){
                $errors['email']='E-mail address already in use.'; $a++;
            }
        }
    }
}


if (empty($fname)){
    $errors['fname']='First name is required.'; $a++;}

if (empty($lname)){
    $errors['lname']='Last name is required.'; $a++;}

if (empty($address)){
    $errors['address']='Address is required.'; $a++;}

if (empty($occup)){
    $errors['occup']='Occupation is required.'; $a++;}

if ($a>0) {

    $data['success'] = false;
    $data['errors']  = $errors;
} else {

    $sql="INSERT INTO registrations (e_mail, first_name, last_name, address, occupation) VALUES ('$email', '$fname', '$lname', '$address', '$occup')";
    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysqli_error($con));
    }

    $data['success'] = true;
    $data['message'] = 'Successful registration!';
}
echo json_encode($data);

mysqli_close($con);