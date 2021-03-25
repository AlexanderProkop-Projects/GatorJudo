<?php

	//Independent connect function.
	function connect(){
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "gatorjudo";
		return new mysqli($servername, $username, $password, $dbname);
	}
	
	//Function to remove writing the same if statement all the time.
	//Passes back a result, but you don't strictly need to catch it.
	function qy($sql){
		$conn = connect();
		$result = $conn->query($sql);
		if($result === FALSE){
			echo "ERROR: " . $conn->error . "<br>";
		}
		$conn->close();
		return $result;
	}
	
	//The following functions create SQL commands and send them to the query function.
	//insert
	function insertEntry($table, $insert){
		
		$parameters = "";
		if($table === "Tournament"){
			$parameters = "(ID)";
			//echo "Tournament";
		}
		else if($table === "Announcement"){
			$parameters = "(uID, title, info)";
			//echo "Announcement";
		}
		else if($table == "Users"){
			$parameters = "(name, email, password)";
		}
		
		$staticInsert = "INSERT INTO " . $table . " " . $parameters . " VALUES (" . $insert . ");";
		qy($staticInsert);
		/*if($conn->query($staticInsert) === True){
			$last_id = $conn->insert_id;
			echo "NEW RECORD CREATED SUCCESSFULLY, LAST ID ENTERED IS: " . $last_id . "<br>";
		}
		else{
			echo "ERROR: " . $staticInsert . " " . $conn->error;
		}*/
	}
	
	//Delete
	function deleteEntry($table, $insert){
		$parameters = "";
		if($table === "Tournament"){
			$parameters = "ID";
		}
		else if($table === "Announcement"){
			$parameters = "uID"; 
		}
		$staticDelete = "DELETE FROM " . $table . " WHERE ". $parameters . "=" . $insert . ";";
		qy($staticDelete);
		
		/*if($conn->query($staticDelete) === True){
			$last_id = $conn->insert_id;
			echo "RECORD DELETED SUCCESSFULLY, LAST ID ENTERED IS: " . $last_id . "<br>";
		}
		else{
			echo "ERROR: " . $staticDelete . " " . $conn->error;
		}*/
	}
	
	function displayAnnounce(){ //This function goes right in line where a table would be.
	//This function will probably be greatly overhauled once more work has gone into the html/css.
		//echo "This is an announce echo.";
		$sql = "SELECT users.name, Announcement.title, Announcement.info FROM Users, Announcement where users.ID = Announcement.uID";
		$result = qy($sql);
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['title'] . "</td>";
			echo "<td>" . $row['info'] . "</td>";
			echo "</tr>";
		}
	}

?>