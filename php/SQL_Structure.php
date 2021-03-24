<?php
	$servername = "localhost";
	$username = "buddy";
	$password = "password";
	$dbname = "myDB";
	//make connection
	$conn = new mysqli($servername, $username, $password) or die("Connection failed: " . $conn->connect_error());

	//create database
	$sql = "CREATE DATABASE IF NOT EXISTS myDB";
	if($conn->query($sql) === true){
		echo "CREATION PASSED" . "<br>";
	}
	else{
		echo "ERROR: " . $conn->error . "<br>";
	}
	$conn->close();
	$conn = new mysqli($servername, $username, $password, $dbname, "3306") or die("Connection failed: " . $conn->connect_error());
	
	//ANNOUNCEMENTS
	$announcements = "create table if not exists Announcement(
					ID int SIGNED AUTO_INCREMENT PRIMARY KEY,
					uID int,
					info text
					)";
					
	if($conn->query($announcements) === true){
		echo "Announcements Passed" . "<br>";
	}
	else{
		echo "ERROR: " . $conn->error . "<br>";
	}		

	//TOURNAMENTS
	$tournaments = "create table if not exists Tournament (
					ID int SIGNED AUTO_INCREMENT PRIMARY KEY
					)";
					
	if($conn->query($tournaments) === true){
		echo "Tournaments Passed" . "<br>";
	}
	else{
		echo "ERROR: \n" . $conn->error . "<br>";
	}
	
	//TAGS
	/*$tag = "create table if not exists Tag (
			tag text PRIMARY KEY
			)";
	if($conn->query($tag) === true){
		echo "Tags Passed" . "<br>";
	}
	else{
		echo "ERROR: " . $conn->error . "<br>";
	}*/
?>