<?php
session_start();


$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="registration";


$conn =new  mysqli($dbhost,$dbuser,$dbpass,$db) or die("Connect failed: %s \n".$conn->error);
mysqli_select_db($conn,'registration');

     $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    //$credit_card_num = $_POST['crd'];
    $password = $_POST['pass'];
    //$rep_password = $_POST['r_pwd'];
    //$status = $_POST['online_status'];

$s= "select * from usertable where fname ='$first_name'"; 
$result= mysql_query($con,$s);
$num=mysqli_num_rows($result);

if ($num==1){
	echo "Username Already Taken";
}else{
	$reg="insert into usertable(firstname,lastname,email,password") values('$first_name','$last_name','$email' ,'$password');
	mysqli_query($con,$reg);
	echo "Registration go";
}

/*
if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
?>