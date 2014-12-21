<?php
	$current_dir = "/home/pybeaner/";
	$dir = opendir($current_dir);
	// return false if end of directory:(file/dir named '0' would return 0,so use false to control)
	echo "<ul>";
	while(false !== ($file=readdir($dir))){
		if($file!="." && $file!=".."){
			echo "<li>$file</li>";
		}
	}
	echo "</ul>";
	closedir($dir);
?>