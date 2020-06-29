<?php
    session_start();
    
    $username=$_POST["uname1"];
    $password=$_POST["psw1"];
    $mail=$_POST["eid"];
    $phone=$_POST["ph"];
    $address=$_POST["addr"];
    
    
    $con=mysqli_connect("localhost","root","","vitcafe");
    //connection error
    if(!$con){
        die("Connection Failed:".mysqli_connect_error());
         }

    //check username
    $query="SELECT username from login";     
    $r1=mysqli_query($con,$query);
    while($res=mysqli_fetch_assoc($r1))
    {
        if($username==$res["username"])
            {
                $_SESSION["msg"]="Username already exist";
                header("location:../HTML files/login.html");
                exit();
            }
    }

    $query1="INSERT into users values('$username','$phone','$address','$mail')";
    $query2="INSERT into login (username,password) values('$username','$password')";
    mysqli_query($con,$query1);
    mysqli_query($con,$query2);
    $_SESSION["msg2"]="Registration Successful";
    echo($_SESSION["msg2"]);
    header("location:../HTML files/login.html");
    exit();




?>