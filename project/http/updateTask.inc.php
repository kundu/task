<?php 
	
	session_start();
	include "database.php";
	$taskID="";
	$taskName="";
	$taskDescription="";
	if(isset($_GET["taskID"])){
	    if(empty($_SESSION["id"])){ 
	    	header("Location:index.php");
	    }
	    else{ 
	    	$taskID=$_GET["taskID"];

	    	$queryForGettingTask="select * from tasks where id_auto='$taskID'";

	    	$result = $conn->query($queryForGettingTask);
			while($row = $result->fetch_assoc()){
				$taskName=$row["task_name"];
				$taskDescription=$row["task_description"];
			}
	    }
	}
?>

	<div class="modal-content">
		<div class="closeMain">
	    	<span id="close" class="close">&times;</span>
	    </div>

	    <label>Task name</label> <br>
		<input type="text" id="taskName" value="<?php echo $taskName; ?>" placeholder="enter the task name"> <br>

		<label>Task Description</label> <br>
		<textarea id="taskDescription"><?php echo $taskDescription; ?></textarea> <br>

		<button class="btn" onclick="taskUpdateClick('<?php echo $taskID; ?>')">Update</button>
	</div>

<!-- </div> -->