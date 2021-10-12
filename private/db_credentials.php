<?php

//keeping these db credentials in this separate file
//WHY?
//1.it's easy to exclude this file from source code managers
//2.allows us to have unique credentials on development & production server
//3.if working with multiple developers, it allows us to have unique credentials for each of those developers
//Development Credentials
define("DB_SERVER", "localhost");//connecting remotely would be the site ip
define("DB_USER", "MechellePresnell");
define("DB_PASS", "Bri96And98Tyl01");
define("DB_NAME", "birdQueries");

//SiteGround Credentials
// define("DB_SERVER", "localhost");
// define("DB_USER", "mechelle_test");
// define("DB_PASS", "Bri96And98Tyl01");
// define("DB_NAME", "dbcf4cssnbyyse");

?>