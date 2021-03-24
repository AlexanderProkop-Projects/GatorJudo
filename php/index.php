<?php

// require('./PHP-FUNCTIONS.php');
// require('./PHP-MySQL-Connect.php');
//This is where the session and cookies will be checked/saved/loaded.

require('../html/head.html'); //This should contain all the header information.
require('../html/index.html');
include 'SQL_Structure.php';
include 'SQL_Functions.php';
insertEntry($conn, "Announcement", "10, 1, \"This is an announcement\"");
deleteEntry($conn, "Announcement", "1");
$conn->close();
//require('../html/body.php'); //This should contain all the stuff for the content of the website.
//require('../html/foot.php'); //This should contain all the stuff for the footer.

// require('./PHP-MySQL-CLOSE.php'); //This should close any open database connection (if needed).

?>
