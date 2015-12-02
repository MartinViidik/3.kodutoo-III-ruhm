<?php 

	//edit_functions.php
	require_once("../../config_global.php");
	$database = "if15_martin";
	
	function getEditData($edit_id){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt= $mysqli->prepare("SELECT post FROM martin_threads WHERE id=?");
		$stmt->bind_param("i",$edit_id);
		$stmt->bind_result($post);
		$stmt->execute();
		
		//object
		$forum = new StdClass();
		
		// kas sain �he rea andmeid k�tte
		// $stmt->fetch() annab �he rea andmeid
		if($stmt->fetch()){
			// sain
			$forum->post = $post;
			
		}else{

		}
		
		return $forum;
		
		$stmt->close;
		$mysqli->close();
	}

	function updateCar($id, $number_plate, $color){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("UPDATE martin_threads SET =? WHERE id=?");
		$stmt->bind_param("si", $post, $id);
		if($stmt->execute()){
			// sai uuendatud
			// kustutame aadressirea t�hjaks
			header("Location: table.php");
			
		}
		
		$stmt->close();
		$mysqli->close();
	}


?>