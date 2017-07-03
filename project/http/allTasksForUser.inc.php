
<div class="tasks-list">

<?php 
	
	session_start();
	include "database.php";

    if(empty($_SESSION["id"])){ 
    	header("Location:index.php");
    }
    else{ 
    	$id=$_SESSION["id"];
    	$userName = $_SESSION["name"];

    	$queryForAllTasks="select * from tasks where user_id='$id'";

		$result = $conn->query($queryForAllTasks);
			while($row = $result->fetch_assoc()){
				$taskID=$row["id_auto"];
				$taskName=$row["task_name"];
				$taskDes=$row["task_description"];
				$taskCreatedDate=$row["created_date"];
				$taskUpdatedDate=$row["updated_date"];
				$allDates="";
				if($taskUpdatedDate==""){
					$allDates="Created: ".$taskCreatedDate;
				}
				else{
					$allDates="Created: ".$taskCreatedDate." Updated: ".$taskUpdatedDate;
				}
				// echo $row["task_name"]."<br>";
?>
    
    <div class="myTask">
    
        <div class="task-header">
            <h4><?php echo $taskName; ?></h4>
        </div>

        <div class="task-des">
            <p><?php echo $taskDes; ?>
            </p>
        </div>

        <div class="task-date">
            <p><?php echo $allDates; ?></p>
        </div>

        <div class="all-buttons">
            <button class="btn" onclick="editClick('<?php echo $taskID; ?>')">Edit</button>
            <button class="btn" onclick="deleteClick('<?php echo $taskID; ?>')">Delete</button>
        </div>
        
    </div>

	<?php 
			}
	    }

	 ?>
</div>