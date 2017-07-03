<?php 
	
	include "database.php";
	session_start();
	if(isset($_GET["taskID"]) && isset($_GET["updateName"]) && isset($_GET["updateDes"])){
	    if(empty($_SESSION["id"])){ 
	    	header("Location:index.php");
	    }
	    else{ 
	    	$taskID=$_GET["taskID"];
	    	$updateName=$_GET["updateName"];
	    	$updateDes=$_GET["updateDes"];
	    	$updateDate=date("d-M-Y");

	    	$queryFortaskUpdate="update tasks set task_name='$updateName' , task_description='$updateDes' , updated_date='$updateDate' where id_auto='$taskID'";

	    	if($conn->query($queryFortaskUpdate)===TRUE){
				// echo "Updated";
			}
			else{
				echo "Not Updated";
			}

	    	// echo "<script type='text/javascript'>alert('$updateDes');</script>";


	    }
	}
?>

