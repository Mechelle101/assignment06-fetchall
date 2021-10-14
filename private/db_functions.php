<?php
 
// /**
//  * connects to the DB
//  *
//  * @returns {string} the DB connection
//  */
function db_connect() {
    $connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect($connection);
    return $connection;
}

/**
 * Error checking on the DB connection
 *
 * @param {string} $connection the DB connection
 *
 * @returns {void}
 */
function confirm_db_connect($connection) {
    if($connection->connect_errno){
        $msg = "Database connection failed: ";
        $msg .= $connection->connect_error;
        $msg .= " (" . $connection->connect_errno . ")";
        exit($msg);
    }
}

/**
 * disconnects from the DB
 *
 * @param {string} $connection DB connection
 *
 * @returns {void}
 */
function db_disconnect($connection){
    if(isset($connection)) {
        $connection->close();
    }
}

?>

