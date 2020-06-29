<?php


$totitems=2;
$totamt=40;

$cart = [['pname'=>'abcd','price'=>'40','qty'=>'6','amt'=>'240'],['pname'=>'abcd','price'=>'40','qty'=>'6','amt'=>'240']];


$to = "bethalaabhay@gmail.com";
$subject = "Order Confirmed";

$pname=$cart[0]['pname'];
$price=$cart[0]['price'];
$qty=$cart[0]['qty'];
$amt=$cart[0]['amt'];

$message = 
"
<html>
	
	<body>
	
		<h3>Your order has been confirmed...</h3>
		<hr>
		<center>
            <p><b>Your Bill</b></p>
        </center>
		<hr>
        <div>
            <p>Item Name: $pname</p>
            <p>Price: $price</p>
            <p>Quantity: $qty</p>
            <p>Amount: $amt</p>
        </div>
		<hr>	
        <center>
            <p><b>Total Amount: $totamt</b></p>
        </center>
		<br>
	</body>
	
</html>
";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


mail($to,$subject,$message,$headers);

echo("mail sent");

?>