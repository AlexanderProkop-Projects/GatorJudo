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
	//ANNOUNCEMENTS
	$qy = "create table if not exists Announcement(
					ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					uID int UNSIGNED,
					title text,
					info text,
					isTournament bool NOT NULL DEFAULT 0
					)";
					
	qy($qy);
		

	//TOURNAMENTS
	$qy = "create table if not exists Tournament (
					ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					aID int UNSIGNED,
					FOREIGN KEY (aID) REFERENCES Announcement (ID)
					)";
					
	qy($qy);
	
	//USERS
	$qy = "create table if not exists Users(
			ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name text,
			email text,
			password text,
			isAdmin bool DEFAULT false
			);";
	
	qy($qy);
	
	//
	$qy = "create table if not exists Tags(
			ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name text NULL,
			descriptor text NULL
			);";
	
	qy($qy);	
	
	//Assign foreign keys to uID in Announcement
	$qy = "ALTER TABLE announcement ADD FOREIGN KEY (uID) REFERENCES USERS(ID);";
	
	qy($qy);
?>