<html>
<body>
<?php
@$fp=fopen('/home/pybeaner/Projects/PHPAndMySQL/chapter01/orders/orders.txt', 'r');
if(!$fp){
	echo "<p><strong>No order pending.Please retry later.</p></strong>";
	exit();
}
while (!feof($fp)) {
	// $char = fgetc($fp);
	// if(!feof($fp)){
		// echo $char=="\n" ? "<br/>":$char;		
	// }
	$order = fgets($fp);
	echo $order."<br/>";
}
?>
</body>
</html>