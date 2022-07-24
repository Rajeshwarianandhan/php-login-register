<?php
    
    include "config.php";

    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $passwordhash=md5($password);
    $mobile=$_POST["mobile"];
    $dob=$_POST["dob"];

    $select="SELECT email FROM user_new WHERE email='{$email}'";
    $result=mysqli_query($conn,$select);
        
    if(mysqli_num_rows($result) > 0){

        echo json_encode(['status' => 'error']);

    }
   else{
    
        $sql="INSERT INTO user_new (fname,lname,email,password,mobile,dob)
        VALUES ('{$fname}','{$lname}','{$email}','{$passwordhash}','{$mobile}','{$dob}')";
   
        if($conn->query($sql)){
   
           echo json_encode(['status'=>'success']);
        }
    
   }
   
?>