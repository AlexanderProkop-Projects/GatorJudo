<?php

	//insert
	function insertEntry($conn, $table, $insert){
		$parameters = "";
		if($table === "Tournament"){
			$parameters = "(ID)";
		}
		else if($table === "Announcement"){
			$parameters = "(ID, uID, info)"; 
		}
		
		$staticInsert = "INSERT INTO " . $table . " " . $parameters . " VALUES (" . $insert . ");";
		
		if($conn->query($staticInsert) === True){
			$last_id = $conn->insert_id;
			echo "NEW RECORD CREATED SUCCESSFULLY, LAST ID ENTERED IS: " . $last_id . "<br>";
		}
		else{
			echo "ERROR: " . $staticInsert . " " . $conn->error;
		}
	}
	
	function deleteEntry($conn, $table, $insert){
		$parameters = "";
		if($table === "Tournament"){
			$parameters = "ID";
		}
		else if($table === "Announcement"){
			$parameters = "uID"; 
		}
		$staticDelete = "DELETE FROM " . $table . " WHERE ". $parameters . "=" . $insert . ";";
		if($conn->query($staticDelete) === True){
			$last_id = $conn->insert_id;
			echo "RECORD DELETED SUCCESSFULLY, LAST ID ENTERED IS: " . $last_id . "<br>";
		}
		else{
			echo "ERROR: " . $staticDelete . " " . $conn->error;
		}
	}
?>