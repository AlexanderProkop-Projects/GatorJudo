<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "gatorjudo";
	
	function qy($sql){
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']) or die("Connection failed: " . $conn->connect_error());
		if($conn->query($sql) == true){
			echo "success <br>";
		}
		else{
			echo "ERROR: " . $conn->error . "<br>";
		}
		$conn->close();
	}
	
	//make connection
	

	//create database
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	$conn = new mysqli($servername, $username, $password) or die("Connection failed: " . $conn->connect_error());
	$conn->query($sql);
	$conn->close();
	
    //USERS
	$qy = "create table if not exists Users(
			ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name text,
			email text,
			password text,
			isAdmin bool DEFAULT false
			);";
			
    qy($qy);
			
			
	//ANNOUNCEMENTS
	$qy = "create table if not exists Announcement(
					ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					info text,
					time DATETIME,
					isTournament bool NOT NULL DEFAULT 0,
                    uID int UNSIGNED,
                    FOREIGN KEY (uID) REFERENCES Users (ID)
					)";
					
	qy($qy);
		

	//TOURNAMENTS
	$qy = "create table if not exists Tournament (
					ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					aID int UNSIGNED,
					FOREIGN KEY (aID) REFERENCES Announcement (ID)
					)";
					
	qy($qy);
	

	
	//Tags
	$qy = "create table if not exists Tags(
			name text PRIMARY KEY,
			descriptor text NULL
			);";
	
	qy($qy);	
	
	//Tags connected to announcements here
	$qy = "create table if not exists Define (
            aId int,
            tag text,
            PRIMARY KEY(aID, tag),
            FOREIGN KEY (aID) REFERENCES Announcement (ID),
            FOREIGN KEY (tag) REFERENCES Tags
            );";
            
    qy($qy);
	
	//Assign foreign keys to uID in Announcement
	//$qy = "ALTER TABLE Announcement ADD FOREIGN KEY (uID) REFERENCES USERS(ID);";
	//,
    //                FOREIGN KEY (Users_uID) REFERENCES Users (ID)
	//qy($qy);
?>
