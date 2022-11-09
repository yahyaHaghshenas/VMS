<?php

$host= "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bitvolunteer";

$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Fullname = $_POST['Fullname'];
$Phone = $_POST['Phone'];
$Email = $_POST['Email'];
$Occupation = $_POST['Occupation'];
$BirthDate = $_POST['BirthDate'];
        
$qry = "INSERT INTO assignment (Username,Password,Fullname,Phone,Email,Occupation,BirthDate) VALUES ('$Username','$Password','$Fullname','$Phone','$Email','$Occupation','$BirthDate')";

$insert = mysqli_query($conn,$qry);

if(!$insert){
    echo "Oops!! Could not add Volunteer";
}
else{
    echo "Succeed";
}
?>