<?php
	$servername = "ec2-34-225-103-117.compute-1.amazonaws.com";
	$username = "xypisuxydtogno";
	$password = "55f3337c8fa1704a8c5419595288b25f7eac164d1180d4852daa97e9727caef4";
	$dbname = "d3ru2ith95uu4r";
	$port = "5432";
	
	function qy($sql){
		$conn = "dbname=" . $GLOBALS['dbname'] . "host=" . $GLOBALS['servername'] . "port=" . $GLOBALS['port'] . "user=" . $GLOBALS['username'] . "password=" . $GLOBALS['password'] . "sslmode=require";
		//$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname'], $GLOBALS['port']) or die("Connection failed: " . $conn->connect_error());
		if($conn->query($sql) == true){
			//echo "success <br>";
		}
		else{
			//echo "ERROR: " . $conn->error . "<br>";
		}
		$conn->close();
	}
	
	//make connection
	

	//create database
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	$conn = "dbname=" . $dbname . "host=" . $servername . "port=" . $port . "user=" . $username . "password=" . $password . "sslmode=require";
	//$conn = new mysqli($servername, $username, $password) or die("Connection failed: " . $conn->connect_error());
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
            ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name text,
			descriptor text NULL
			);";
	
	qy($qy);	
	
	//Tags connected to announcements here
	$qy = "create table if not exists Define (
            ID int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            aID int UNSIGNED,
            tag text,
            FOREIGN KEY (aID) REFERENCES Announcement (ID)
            );";
            
    qy($qy);
	
	//Assign foreign keys to uID in Announcement
	//$qy = "ALTER TABLE Announcement ADD FOREIGN KEY (uID) REFERENCES USERS(ID);";
	//,
    //                FOREIGN KEY (Users_uID) REFERENCES Users (ID)
	//qy($qy);
?>
