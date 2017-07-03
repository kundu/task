<?php 
	session_start();
	include "database.php";

    if(empty($_SESSION["id"])){ 
    	header("Location:index.php");
    }
    else{ 
    	$id=$_SESSION["id"];
    	$userName = $_SESSION["name"];
    }

    if(isset($_POST["taskAddClick"])){
    	$createdTaskDate = date("d-M-Y");
    	$taskName=$_POST["taskName"];
    	$taskDescription=$_POST["taskDescription"];

    	$queryForTaskInsert="insert into tasks values('','$id','$taskName','$taskDescription','$createdTaskDate','')";

    	if($conn->query($queryForTaskInsert)===TRUE){
			// echo "Inserted";
		}
		else{
			echo "Not inserted";
		}
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title><?php echo $userName;?></title>

 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/mobile.css"> 
 </head>


 <style type="text/css">
	.modal {
	    display: none; 
	    position: fixed;
	    z-index: 1; 
	    padding-top: 100px; 
	    left: 0;
	    top: 0;
	    width: 100%; 
	    height: 100%;
	    overflow: auto;
	    background-color: rgb(0,0,0); 
	    background-color: rgba(0,0,0,0.4);
	}

	.modal-content {
	   background-color: rgba(205, 216, 203, 0.95);
        margin: auto;
        padding: 42px;
        border: 1px solid #888;
        width: 40%;
        box-shadow: -1px 1px 16px #222;
	}

	.close {
	    color: #aaaaaa;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}
 </style>


 <script type="text/javascript">
 	function seeAllTasks(){

 		document.getElementById("create-task-panel").style.display="none";
 		document.getElementById("all-task-panel").style.display="block";

 		var theFile="allTasksForUser.inc.php";
		var theDiv="all-task-panel";
 		
 		if(window.XMLHttpRequest){
	            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){  
            	document.getElementById(theDiv).innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open('POST',theFile,true);
        xmlhttp.send();

 	}


 	function editClick(taskID){
 		var theFile="updateTask.inc.php?taskID="+taskID;
		var theDiv="myModal";
 		
 		if(window.XMLHttpRequest){
	            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){  
            	document.getElementById(theDiv).innerHTML=xmlhttp.responseText;

            	var modal = document.getElementById('myModal');
				var span = document.getElementById("close");
				modal.style.display = "block";
				span.onclick = function() {
				    modal.style.display = "none";
				}
				window.onclick = function(event) {
				    if (event.target == modal) {
				        modal.style.display = "none";
				    }
				}
            }
        }
        xmlhttp.open('POST',theFile,true);
        xmlhttp.send();

 	}

 	function taskUpdateClick(taskID){
 		var updateName=document.getElementById("taskName").value;
 		var updateDes=document.getElementById("taskDescription").value;

 		var theFile="updateTaskPerform.inc.php?taskID="+taskID+"&updateName="+updateName+"&updateDes="+updateDes;
 		var theDiv="footer-panel";


 		xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){  
            	document.getElementById(theDiv).innerHTML=xmlhttp.responseText;
            	document.getElementById('myModal').style.display = "none";
            	seeAllTasks();
            }
        }
        xmlhttp.open('POST',theFile,true);
        xmlhttp.send();

 	}

 	function deleteClick(taskID){
 		
 		var theFile="deleteTask.inc.php?taskID="+taskID;
		var theDiv="all-task-panel";
 		
 		if(window.XMLHttpRequest){
	            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){  
            	document.getElementById(theDiv).innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open('POST',theFile,true);
        xmlhttp.send();

        seeAllTasks();

 	}

 	function createNewTask(){
 		document.getElementById("all-task-panel").style.display="none";
 		document.getElementById("create-task-panel").style.display="block";
 	}
 </script>


 <body>
 	<div class="header-panel header-panel-user-css">
 		<div class="row">
 			<div class="welcome-note col-lg-3 col-md-3 col-sm-3 col-xs-12">
 				<h4><?php echo "Welcome ".$userName." !!!"; ?></h4>
 			</div>

 			<div class="all-list-b col-lg-3 col-md-3 col-sm-3 col-xs-12">
 				<button class="btn" onclick="seeAllTasks()">See all tasks</button>
 			</div>

 			<div class="create-list-b col-lg-3 col-md-3 col-sm-3 col-xs-12">
 				<button class="btn" onclick="createNewTask()">Create new task</button>
 			</div>

 			<div class="logout-a col-lg-3 col-md-3 col-sm-3 col-xs-12">
 				<a class="btn" href="logout.php">Logout</a>		
 			</div>
 		</div>
 	</div>

 	<div class="body-panel">


 		<div class="all-task-panel" id="all-task-panel">

 		</div>

 		<div id="myModal" class="modal">
 		</div>




 		<div class="create-task-panel" id="create-task-panel" style="display: none;">
 			<div class="wrapper">
 				<form action="user.php" method="post">
 					<label>Task name</label> <br>
 					<input type="text" name="taskName" placeholder="enter the task name" required> <br>

 					<label>Task Description</label> <br>
 					<textarea name="taskDescription" required></textarea> <br>

 					<button class="btn" name="taskAddClick">Add your task</button>
 				</form>
 			</div>
 		</div>
 	</div>

 	<div class="footer-panel" id="footer-panel">
 		
 	</div>
 	
 </body>

 	<script type="text/javascript">
 		seeAllTasks();
 	</script>
 </html>