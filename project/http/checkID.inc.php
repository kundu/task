<?php
	include "database.php";

	if(isset($_GET["id"])){
		$id = $_GET["id"];
		
		$queryForCheck="select * from user where id='$id'";

		$result = $conn->query($queryForCheck);
        $row = $result->fetch_assoc();
        if(empty($row)){
        	echo "ID is okay";
        }
        else{
        	echo "This id is already taken.<br>CHOICE ANOTHER ID";
        }
	}
	else{
		echo "string";
	}
?>