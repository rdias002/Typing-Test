
<?php
	$conn = new mysqli("localhost","root","");
	if($conn->select_db("typingtest")){
		
	}
	else{
		// database file path
		$filename = 'database/typingtest.sql';

		// used to store current query
		$templine = '';

		// Open file
		$fp = fopen($filename, 'r');

		// Loop through each line
		while (($line = fgets($fp)) !== false) {
			// Skip it if it's a comment
			if (substr($line, 0, 2) == '--' || $line == '')
				continue;

			// Add this line to the current segment
			$templine .= $line;

			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';') {
				// Perform the query
				if(!$conn->query($templine)){
					print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
				}
				// Reset temp variable to empty
				$templine = '';
			}
		}
		fclose($fp);
	}
?>