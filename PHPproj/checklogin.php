<?php

    session_start();
    $uname=$_POST["uname"];
    $pass=$_POST["pwd"];
      
    

    $con=mysqli_connect("localhost","root","","vitcafe");
    //connection error
    if(!$con){
        die("Connection Failed:".mysqli_connect_error());
         }



  
  
  
  
  
    $query="SELECT password FROM login WHERE username='".$uname."'";
    $r1=mysqli_query($con,$query);
    if(mysqli_num_rows($r1)>0)
    {
        $res=mysqli_fetch_assoc($r1);
        if($pass==$res["password"])
        {   
            $_SESSION["logged"]=true;
            $_SESSION["username"]=$uname;
            $query1="SELECT email FROM users WHERE username='".$uname."'";
            $r2=mysqli_query($con,$query1);
            $res1=mysqli_fetch_assoc($r2);
            $_SESSION["email"]=$res1["email"];
            header("location:../HTML files/online.html");
            exit();
        }    
        else
            $_SESSION["msg"]="Incorrect Password";
    }
    else
    {
        $_SESSION["msg"]="Username does not exist";
    } 

    header("location:../HTML files/login.html");
    
    
 ?>   