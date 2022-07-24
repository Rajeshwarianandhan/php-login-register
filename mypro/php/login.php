<?php

include "config.php";

$email=$_POST["email"];
$password=$_POST["password"];
$passwordhash=md5($password);


// $select = mysqli_query($conn, "SELECT * FROM user WHERE email='".$_POST['email']."'");
$select = mysqli_query($conn, "SELECT * FROM user_new WHERE email='{$email}'");

if(mysqli_num_rows($select) > 0){
    // $row=mysqli_fetch_array($select);
    $row=mysqli_fetch_assoc($select);
    // $row = $select->fetch(PDO::FETCH_OBJ);

    $email=$row['email'];
    $cpassword=$row['password'];
    $fname=$row['fname'];
    $lname=$row['lname'];
    $mobile=$row['mobile'];
    $dob=$row['dob'];
    $id=$row['id'];

    if($cpassword===$passwordhash){
        session_start();
    
        $_SESSION['id'] = $id;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['dob'] = $dob;


            echo json_encode(['status' => 'success']);
        }
        else{
            echo json_encode(['status' => 'passError']);
        }
    }else{
        echo json_encode(['status' => 'emailError']);
    }

?>





