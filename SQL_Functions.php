<?php
    //test
	//Independent connect function.
	function connect(){
	$servername = "ec2-34-225-103-117.compute-1.amazonaws.com";
	$username = "xypisuxydtogno";
	$password = "55f3337c8fa1704a8c5419595288b25f7eac164d1180d4852daa97e9727caef4";
	$dbname = "d3ru2ith95uu4r";
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
	
	function insertAnnouncement($message, $time, $uID){
        $exist = "SELECT * FROM Announcement WHERE time = '" . $time . "' AND info = \"" . $message . "\"";
        $result = qy($exist);
        
        if (!$result->fetch_assoc()) {
            $Insert = "INSERT INTO " . "Announcement " . "(info, time, uID)" . " VALUES (\"" . $message . "\", \"" . $time . "\", \"" . $uID . "\");";
            qy($Insert);
        }
        
        $findID = "SELECT ID FROM Announcement WHERE time = '" . $time . "' AND info = \"" . $message . "\"";
        $result2 = qy($findID)->fetch_assoc();
        $ID = $result2['ID'];
        return $ID;
	}
	
	function insertUser($name, $email, $password) {
        $exist = "SELECT * FROM Users WHERE name = \"" . $name . "\" AND email = \"" . $email . "\" AND password = \"" . $password . "\"";
        $result = qy($exist);
        
        if (!$result->fetch_assoc()) {
            $Insert = "INSERT INTO " . "Users " . "(name, email, password)" . " VALUES (\"" . $name . "\", \"" . $email . "\", \"" . $password . "\");";
            qy($Insert);
        }
	}
	
	function defineTag($name, $descriptor) {
        $exist = "SELECT * FROM Tags WHERE name = \"" . $name . "\"";
        $result = qy($exist);
        
        if (!$result->fetch_assoc()) {
            $Insert = "INSERT INTO " . "Tags " . "(name, descriptor)" . " VALUES (\"" . $name . "\", \"" . $descriptor . "\");";
            qy($Insert);
        }
	}
	
	function insertTag($aID, $tagName) {
        $exist = "SELECT * FROM Define WHERE aID = \"" . $aID . "\" AND tag = \"" . $tagName . "\"";
        $result = qy($exist);
    
        if (!$result->fetch_assoc()) {
            $Insert = "INSERT INTO " . "Define " . "(aID, tag)" . " VALUES (\"" . $aID . "\", \"" . $tagName . "\");";
            qy($Insert);
        }
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
		else if($table === "Users"){
            $parameters = "name";
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
	
	function getMaxID(){
        $sql = "SELECT Max(ID) AS MAX FROM Announcement";
        $result = qy($sql)->fetch_assoc();
        return $result['MAX'];	
	}
	
	function getAnnouncement($ID){ //This function goes right in line where a table would be.
	//This function will probably be greatly overhauled once more work has gone into the html/css.
		//echo "This is an announce echo.";
		$sql = "SELECT Users.name, Announcement.info, Announcement.time FROM Users, Announcement WHERE Users.ID = Announcement.uID AND Announcement.ID = " . $ID;
		$result = qy($sql)->fetch_assoc();
		
		return array($result['name'], $result['info'], $result['time']);
		/*while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['title'] . "</td>";
			echo "<td>" . $row['info'] . "</td>";
			echo "</tr>";
		}*/
	}
	
    function getPracticeAnnouncement($ID){

		$sql = "SELECT name, Announcement.info, Announcement.time
                FROM Announcement JOIN Users JOIN Define
                WHERE Announcement.uID = Users.ID AND Announcement.ID = Define.aID AND tag = \"Practice\" AND Announcement.ID = " . $ID;
                
		$result = qy($sql)->fetch_assoc();
		
		return array($result['name'], $result['info'], $result['time']);
	}
	
    function getTournamentAnnouncement($ID){

		$sql = "SELECT name, Announcement.info, Announcement.time
                FROM Announcement JOIN Users JOIN Define
                WHERE Announcement.uID = Users.ID AND Announcement.ID = Define.aID AND tag = \"TOURNAMENT\" AND Announcement.ID = " . $ID;
                
		$result = qy($sql)->fetch_assoc();
		
		return array($result['name'], $result['info'], $result['time']);
	}

?>
