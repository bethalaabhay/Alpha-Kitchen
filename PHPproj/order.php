<?php
    session_start();
    $_SESSION["cart"]=array();
    $totamt=0;
    $totitems=0;
    $order=array("p01"=>$_POST["p01"],"p02"=>$_POST["p02"],"p03"=>$_POST["p03"],"p04"=>$_POST["p04"],"p05"=>$_POST["p05"],"p06"=>$_POST["p06"],"p07"=>$_POST["p07"],"p08"=>$_POST["p08"],"p09"=>$_POST["p09"],"p10"=>$_POST["p10"],"p11"=>$_POST["p11"],"p12"=>$_POST["p12"],"p13"=>$_POST["p13"],"p14"=>$_POST["p14"],"p15"=>$_POST["p15"],"p16"=>$_POST["p16"],"p17"=>$_POST["p17"],"p18"=>$_POST["p18"],"p19"=>$_POST["p19"],"p20"=>$_POST["p20"]);
    $id=array("p01","p02","p03","p04","p05","p06","p07","p08","p09","p10","p11","p12","p13","p14","p15","p16","p17","p18","p19","p20");
    $con=mysqli_connect("localhost","root","","vitcafe");
    for($i=0;$i<20;$i++)
    {
        if($order[$id[$i]]>0)
        {
            $query="SELECT * from items WHERE pid='".$id[$i]."'";
            $r1=mysqli_query($con,$query);
            while($res=mysqli_fetch_assoc($r1))
            {
                $name=$res['pname'];
                $price=$res['price'];
                $qty=$order[$id[$i]];
                $amt=$price*$qty;
                $res["qty"]=$qty;
                $res["amt"]=$amt;
                $totamt=$totamt+$amt;
                $totitems++;
                array_push($_SESSION["cart"],$res);
            }

        }
    }
    $_SESSION["totitems"]=$totitems;
    $_SESSION["totamt"]=$totamt;



    $to = $_SESSION["email"];
    $subject = "Order Received";


    $message = 
    "
    <html>
        
        <body>
        
            <h4>We are pleased to receive your order...</h4>
            <hr>
            <center>
                <p><b>Your Bill</b></p>
            </center>
            <hr>
    ";

    for($i=0;$i<$_SESSION["totitems"];$i++)
    {
        $mpname=$_SESSION['cart'][$i]['pname'];
        $mprice=$_SESSION['cart'][$i]['price'];
        $mqty=$_SESSION['cart'][$i]['qty'];
        $mamt=$_SESSION['cart'][$i]['amt'];
        
        $message .=
        "
        <div>
            <p>Item Name: $mpname</p>
            <p>Price: $mprice</p>
            <p>Quantity: $mqty</p>
            <p>Amount: $mamt</p>
        </div>
        <hr>	
        ";
    }

    $mtotamt=$_SESSION['totamt'];

    $message .=
    "
    <center>
        <p><b>Total Amount: $mtotamt</b></p>
    </center>
    <hr>
    <br>
    <br>
    </body>
    </html>
    ";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


    mail($to,$subject,$message,$headers);



    header("location:../HTML files/bill.html");
    exit();
    
?>