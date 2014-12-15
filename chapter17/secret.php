<?php
$name = $_POST['name'];
$password = $_POST['password'];
if(!isset($name)|| !isset($password)){
	?>
	<h1>Please Log In</h1>
	<p>This page is secret</p>
	<form action="secret.php" method="post">
		Username:<input type="text" name="name"><br/>
		Password:<input type="password" name="password"><br/>
		<input type="submit" value="Submit">
	</form>
<?php
}else{
	if($name!="user" || $password!="pass"){
		echo "<h1>Go away!</h1>".
			"<p>You are not authorized to use this resource</p>";
	}else{
		echo "<h1>Here it is!</h1>".
			"<p>bet you are glad to see this secret page!</p>";
	}
}
?>