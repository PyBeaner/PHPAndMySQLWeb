<?php
$dir = '/home/pybeaner';

// ascending
$files1 = scandir($dir);
foreach ($files1 as $file) {
	echo "<li>$file</li>";
}

// descending
$files2 = scandir($dir,1);
foreach ($files2 as $file) {
	echo "<li>$file</li>";
}
?>

