<html>
<body>
<?php
	$searchType = $_POST['searchType'];
	$searchTerm = $_POST['searchTerm'];
	if(!$searchType || !$searchTerm){
		echo "you ...";
		exit();
	}
	if(!get_magic_quotes_gpc()){
		$searchType = addslashes($searchType);
		$searchTerm = addslashes($searchTerm);
	}

	require_once("MDB2.php");// where is MDB2.php???
	$user = 'bookuser';
	$password = "bookuser123";
	$db_name = 'books';
	$host= "localhost";
	$dsn = "mysqli://".$user.":".$password."@".$host."/".$db_name;
	$db = &MDB2::connect($dsn);

	if(MDB2::isError($db)){
		echo $db->getMessage();
		exit();
	}
	$query = "select * from books where $searchType like '%searchTerm%'";
	$result = $db.query($query);

	if(MDB2::is_Error($result)){
		echo $db->getMessage();
		exit();
	}

	$num_results= $result->numRows();
	for($i=0;$i<$num_results;$i++){
		$row = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
		echo htmlspecialchars(stripcslashes($row['title']));
		echo "</strong><br/>Author: ";
		echo stripcslashes($row['author']);
		echo "<br/>ISBN: ";
		echo stripcslashes($row['isbn']);
		echo "<br/>Price: ";
		echo stripcslashes($row['price']);
		echo "</p>";
	}
	$db->disconnect();
?>	
</body>
</html>