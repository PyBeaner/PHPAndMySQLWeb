<?php
$name = $_POST['name'];
$password = $_POST['password'];
if(!isset($name)|| !isset($password)){
	?>
	<h1>Please Log In</h1>
	<p>This page is secret</p>
	<form action="secretdb.php" method="post">
		Username:<input type="text" name="name"><br/>
		Password:<input type="password" name="password"><br/>
		<input type="submit" value="Submit">
	</form>
<?php
}else{
	// @$db = new mysqli("localhost", "web_auth", "web_auth123", "auth_test");
	@$db =  mysqli_connect("localhost","web_auth","web_auth123");
	$selected = mysqli_select_db($db, 'auth_test');
	if(!$selected){
		echo "can not select database";
	}
	if(mysqli_connect_errno()){
		echo "cannot connect to the database";
	}
	$query = "select count(*) from users where name='$name' and password=sha1('$password')";
	// $query = "select count(*) from users where name='$name' and password='$password'";

	$result = mysqli_query($db, $query);
	$count =mysqli_fetch_row($result)[0];
	echo $count;
	if($count>0){
		echo "<h1>Here it is!</h1>".
			"<p>bet you are glad to see this secret page!</p>";
	}else{
		echo "<h1>Go away!</h1>".
			"<p>You are not authorized to use this resource</p>";
	}
}
?>