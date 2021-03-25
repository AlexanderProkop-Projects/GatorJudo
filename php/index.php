<?php

//This is where the session and cookies will be checked/saved/loaded.


//include 'SQL_Structure.php';
include 'SQL_Functions.php';
//insertEntry("Users", "\"Jeff\", \"FAKE_EMAIL@AOL.COM\", \"password\"");
//insertEntry("Users", "\"Dale\", \"ITSDALE@AOL.COM\", \"password\"");
//insertEntry("Users", "\"Chad\", \"Total_chad@AOL.COM\", \"Chad_dad\"");
insertEntry("Announcement", "1,\"THIS IS A TITLE\" , \"This is an announcement\"");
insertEntry("Announcement", "3,\"CHAD WAS HERE\" , \"THIS ANNOUNCEMENT BROUGHT TO YOU BY THE AWESOME CHAD\"");

require('../html/head.html'); //This should contain all the header information.
require('../html/index.html');
//require('../html/body.php'); //This should contain all the stuff for the content of the website.
//require('../html/foot.php'); //This should contain all the stuff for the footer.
deleteEntry("Announcement", "1");
deleteEntry("Announcement", "3");
// require('./PHP-MySQL-CLOSE.php'); //This should close any open database connection (if needed).

?>
