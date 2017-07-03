<?php 
	session_start();
	include "database.php";

	if(isset($_GET["taskID"])){
	    if(empty($_SESSION["id"])){ 
	    	header("Location:index.php");
	    }
	    else{ 
	    	$taskID=$_GET["taskID"];

	    	$query="delete from tasks where id_auto='$taskID'";
	    	$result2=mysqli_query($conn , $query);

	    	if($result2){
	    		echo "Deleted";
	    	}
	    	else{
	    		echo "not deleted";
	    	}
	    }
	}
	else{

	}
?>