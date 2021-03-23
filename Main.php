<!DOCTYPE html>
<html lang = "en">
<head>
    <title>TEST SITE</title>
</head>
<body>
<?php
	include 'SQL_Structure.php';
	include 'SQL_Functions.php';
	insertEntry($conn, "Announcement", "10, 1, \"This is an announcement\"");
	deleteEntry($conn, "Announcement", "1");
	$conn->close();
?>
</body>
</html>