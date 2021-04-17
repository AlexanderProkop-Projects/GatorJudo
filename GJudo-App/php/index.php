<?php
$first = false;

if($first) {
    echo "Creating Database";
    include 'SQL_Structure.php';
    include 'SQL_Functions.php';
    insertUser("Facebook", "Facebook.com", "no password");
    defineTag("PRACTICE", "A practice announcement");
}
else {
    //This is where the session and cookies will be checked/saved/loaded.

    //echo "Hello World";

    include 'SQL_Functions.php';
    include 'Facebook.php';

    //insertEntry("Users", "\"Jeff\", \"FAKE_EMAIL@AOL.COM\", \"password\"");
    //insertEntry("Users", "\"Dale\", \"ITSDALE@AOL.COM\", \"password\"");
    //insertEntry("Users", "\"Chad\", \"Total_chad@AOL.COM\", \"Chad_dad\"");
    //insertEntry("Announcement", "1,\"THIS IS A TITLE\" , \"This is an announcement\"");
    //insertEntry("Announcement", "2,\"Don't think we need titles\" , \"Hello Judo Club\"");
    //insertEntry("Announcement", "3,\"CHAD WAS HERE\" , \"THIS ANNOUNCEMENT BROUGHT TO YOU BY THE AWESOME CHAD\"");

    //include 'Facebook.php';

    //require('../html/head.html'); //This should contain all the header information.
    require('../html/index.html');
    //deleteEntry("Announcement", "1");
    //deleteEntry("Announcement", "3");
    //deleteEntry("Users", "'Jeff'");
    //deleteEntry("Users", "'Dale'");
    //deleteEntry("Users", "'Chad'");
    //require('./PHP-MySQL-CLOSE.php'); //This should close any open database connection (if needed).
}




?>