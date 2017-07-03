<?php 

	// php files

	ob_start();
	session_start();

	if(empty($_SESSION["id"])){ 
    }
    else{ 
        header("Location:user.php");
    }

	include "database.php";

	if(isset($_POST["signup_click"])){

		$name=$_POST["name"];
		$id=$_POST["id"];
		$password=hash('sha512', $_POST["password"]);
		$description=$_POST["description"];

		$queryForUserCreate="insert into user values('','$name','$id','$password','$description')";

		if($conn->query($queryForUserCreate)===TRUE){
			$_SESSION["id"]=$id;
        	$_SESSION["name"]=$name;
        	header("Location:user.php");
		}
		else{
			echo "not created";
		}
	}


	if(isset($_POST["loginClick"])){
		$loginId=$_POST["loginId"];
		$loginPassword=hash('sha512', $_POST["loginPassword"]) ;
		
		$userFindQuerry="select * from user where id='$loginId' and password='$loginPassword'";

		$result = $conn->query($userFindQuerry);
        $row = $result->fetch_assoc();
        if(empty($row)){
        	echo "Wrong username password !!! Try again.";
        }
        else{
        	$_SESSION["id"]=$loginId;
        	$_SESSION["name"]=$row["name"];
        	header("Location:user.php");
        }
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<!-- base style st -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/mobile.css"> 
</head>


<style>
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
        background-color: rgba(250, 252, 250, 0.95);
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
	// checks wherether id is exists or not 
	function search_key_up_click(){
		var id=document.getElementById("id").value;
		var theFile="checkID.inc.php?id="+id;
		var theDiv="id_result";

		if(id!=""){
			document.getElementById(theDiv).innerHTML="Checking your id";
			
			if(window.XMLHttpRequest){
	            xmlhttp=new XMLHttpRequest();
	        }
	        else{
	            xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	        }

	        xmlhttp.onreadystatechange=function(){
	            if(xmlhttp.readyState==4 && xmlhttp.status==200){  document.getElementById(theDiv).innerHTML=xmlhttp.responseText;

	            	var s=document.getElementById(theDiv).innerHTML;
	        		if(s=="ID is okay"){
			        	document.getElementById("hidden_input").value="true";
			        }
			        else{
			        	document.getElementById("hidden_input").value="";	
			        }
	            }
	        }
	        xmlhttp.open('POST',theFile,true);
	        xmlhttp.send();
	        
	        
    	}
    	else{
    		document.getElementById(theDiv).innerHTML="You must give an id!!";
    		document.getElementById("hidden_input").value="";
    	}

	}
</script>	
	

<body>
	<div class="container-fluid">

		<div class="header-panel">
			<h1>Task Management</h1>
			<div class="menu-panel" id="menu_panel">
			
			</div>			
		</div>


		<div class="body-panel index-body-css" id="body_panel">
			<div class="signup-header">
				<h3>Create your account or <button class="btn" id="loginButtonCLick">Log in</button></h3>
			</div>

			<div class="signup-panel">
				<form method="post" action="index.php">
					<label>Name</label> <br>
					<input type="text" name="name" placeholder="your name" required=""> <br>

					<label>ID</label> <br>
					<input type="text" name="id" id="id" placeholder="choice your id" required="" onkeyup="search_key_up_click()"> <br>

					<input type="text" id="hidden_input" name="hidden_input_name" required hidden>
					<div id="id_result">
					</div>

					<label>Password</label> <br>
					<input type="password" name="password" placeholder="password" required=""> <br>

					

					<label>Description</label> <br>
					<textarea name="description" required=""></textarea> <br>

					<button class="btn" name="signup_click">Create your account</button>
				</form>
			</div>


			<div class="login-panel">
				
				<div id="myModal" class="modal">

					<div class="modal-content">
						<div class="closeMain">
					    	<span class="close">&times;</span>
					    </div>

					    <form action="" method="post">
					    	<label>ID</label><br>
					    	<input type="text" name="loginId" required><br>
					    	<label>Password</label><br>
					  		<input type="password" name="loginPassword" required>
					  		<br>
					  		<button class="btn" name="loginClick" style="margin-top: 5px; cursor: pointer;">Log in</button>
					  	</form>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-panel" id="footer_panel">
			
		</div>

	</div>

	
</body>
	
	<script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/custom.js"> </script>

	<script>

		var modal = document.getElementById('myModal');
		var btn = document.getElementById("loginButtonCLick");
		var span = document.getElementsByClassName("close")[0];
		btn.onclick = function() {
		    modal.style.display = "block";
		}
		span.onclick = function() {
		    modal.style.display = "none";
		}
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
        
        
	</script>
</html>

