<?php
$isbn = $_POST['isbn'];
$author = $_POST['author'];
$title = $_POST['title'];
$price = $_POST['price'];

if(!$isbn || !$author || !$title || !$price){
	echo "you haven't entered all the required fields</br>"
		."Please go back and try again!";
	exit();
}

if(!get_magic_quotes_gpc()){
	$isbn = addslashes($isbn);
	$author = addslashes($author);
	$title = addslashes($title);
	$price = doubleval($price);
}

@$db = new mysqli("localhost", "bookuser", "bookuser123", "books");
if(mysqli_connect_errno()){
	echo "Error:Could not connect to the database";
	exit();
}
$query = "insert into books "
	."set isbn='$isbn',author='$author',title='$title',price='$price'";
// echo $query;

$result = $db->query($query);
if($result){
	echo $db->affected_rows. " book inserted into database";
}else{
	echo "An Error has occured, The item was not added";
}
$db->close();
?>