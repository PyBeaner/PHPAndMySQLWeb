<html>
<head>
	<title>Bob Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php
	error_reporting(E_ALL);
	define("TIREPRICE",100);
	define("OILPRICE",10);
	define("SPARKPRICE",4);
	echo "<p>Order processed at ";
	echo date("Y-m-d h:i:s");
	echo ".<p>";

	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	echo "<p>Your order is as follows:</p>";
	echo $tireqty. " tires<br/>";
	echo $oilqty. " bottles of oil<br/>";
	echo $sparkqty. " spark plugs<br/>";

	$toyalqty = $tireqty + $oilqty +$sparkqty;
	echo "Items ordered:". $toyalqty."<br/>";
	$totalamount = $tireqty*TIREPRICE
				 + $oilqty*OILPRICE
				 + $sparkqty*SPARKPRICE;
	echo "Subtotal: $".number_format($totalamount,2). "<br/>";
	$taxrate = 0.10;
	$totalamount = $totalamount*(1+$taxrate);
	echo "Total including tax: $".number_format($totalamount,2). "<br/>";
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];//  /var/www/html/
	$file = fopen("/home/pybeaner/Projects/PHPAndMySQL/chapter01/orders/orders.txt","a");
	if(!$file){
		echo "<p><strong>Your order could not be processed at this time.
		. Please try  again  later.</strong></p>";
		exit();
	}
	$output = date("Y-m-d h:i:s")."\t"."$tireqty tires\t"."$oilqty oil\t"."$sparkqty spark plugs"."\t$totalamount\n";
	fwrite($file, $output);
	flock($file, LOCK_UN);
	fclose($file);
	echo "order processed!";
?>
</body>
</html>