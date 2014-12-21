<?php
	$current_dir = "/home/pybeaner/";
	$dir = dir($current_dir);
	// return false if end of directory:(file/dir named '0' would return 0,so use false to control)
	echo "<ul>";
	while(false !== ($file=$dir->read())){
		if($file!="." && $file!=".."){
			echo "<li>$file</li>";
		}
	}
	echo "</ul>";
	$dir->close();
?>