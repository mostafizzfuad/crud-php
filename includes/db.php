<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE_NAME", "jaguar");

$db_connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE_NAME); // connecting the database