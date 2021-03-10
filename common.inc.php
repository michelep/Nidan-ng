<?php

include __DIR__."/config.inc.php";

global $DB;

function dbOpen() {
    global $DB, $CFG;

    $DB = new mysqli($CFG["dbHost"], $CFG["dbUsername"], $CFG["dbPassword"], $CFG["dbDB"], $CFG["dbPort"]);

    if ($DB->connect_errno) {
	echo "Error: Failed to make a MySQL connection, here is why: \n";
	echo "Errno: " . $DB->connect_errno . "\n";
	echo "Error: " . $DB->connect_error . "\n";
	return false;
    }
    return $DB;
}

function CloseDB() {
    global $DB;
    $DB->close();
}

function doQuery($query) {
    global $DB;
    if($result = $DB->query($query)) {
	return $result;
    } else {
	printf("[%s] %s\n",$_SERVER['SCRIPT_NAME'],$DB->error($DB));
	exit();
    }
}

//////////////////////////////////////////////////
//
// Session class
//
/////////////////////////////////////////////////
class Session {
    var $ID;

    function __construct($session_id) {
	// Purge expired sessions (1 hour inactivity)
	$result = doQuery("DELETE FROM Sessions WHERE TIMESTAMPDIFF(MINUTE,lastAction,NOW()) > 60;");
	// New or already active session?
	$result = doQuery("SELECT userId FROM Sessions WHERE ID='$session_id';");
	if($result->num_rows > 0) {
	    // Session still exists, fetch data
	    $row = $result->fetch_assoc();
	    $this->ID = $row["ID"];
	    // Update lastAction field
	    doQuery("UPDATE Sessions SET lastAction=NOW() WHERE ID='$session_id';");
	} else {
	    // New session, add to DB
	    doQuery("INSERT INTO Sessions(ID,addDate,lastAction) VALUES ('$session_id',NOW(),NOW());");
	}
    }
}

//////////////////////////////////////////////////
//
// Node class
//
/////////////////////////////////////////////////
class Node {
    var $ID;

    function addEvent($eventType) {

    }
}

// Open DB connection
dbOpen();

if(php_sapi_name() != 'cli') {
    // SESSION
    if(session_start()) {
	$session_id = session_id();
	$mySession = new Session($session_id);
    }
}

?>