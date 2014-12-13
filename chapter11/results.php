<html>
<head>
<title>Book-O-Rama Search Results</title>
</head>
<body>
<h1>Book-O-Rama Search Results</h1>
<?php
$searchType = trim($_POST['searchType']);
$searchTerm= trim($_POST['searchTerm']);
if(!$searchType || !$searchTerm){
	echo "You haven't entered search detail.Please go back and try again!";
	exit();
}
if(!get_magic_quotes_gpc()){
	$searchTerm = addslashes($searchTerm);
	$searchType = addslashes($searchType);
}

@$db = new mysqli("localhost", "bookuser", "bookuser123", 'books');
if(mysqli_connect_errno()){
	echo "Error:Counld not connect to the database,Please try again later";
	exit();
}

$query = "select *from books where $searchType like '%$searchTerm%'";
echo $query;
$result = $db->query($query);
$num_results = $result->num_rows;
echo "<p>Number of book found:$num_results</p>";

for($i=0;$i<$num_results;$i++){
	$row = $result->fetch_assoc();
	echo "<p><strong>".($i+1).". Title:";
	echo htmlspecialchars(stripcslashes($row['title']));
	echo "</strong><br/>Author: ";
	echo stripcslashes($row['author']);
	echo "<br/>ISBN: ";
	echo stripcslashes($row['isbn']);
	echo "<br/>Price: ";
	echo stripcslashes($row['price']);
	echo "</p>";
}
$result->free();
$db->close();
?>
</body>
</html>