<?php

// This guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
// $dbhost = 'localhost';
// $dbuser = 'sally';
// $dbpass = 'P@ssword1234';
// $dbname = 'salamanders';

// localhost Data
// define("DB_SERVER", "localhost");
// define("DB_USER", "wbip");
// define("DB_PASS", "wbip123");                                                      
// define("DB_NAME", "globe_bank");

// AwardSpace DataBase
// define("DB_SERVER", "pdb1048.awardspace.net");
// define("DB_PASS", "2GbV?dNu9taHh!3");
// define("DB_NAME", "4368096_globebank");
// define("DB_USER", "4368096_globebank");

// salamander DataBase on localhost
// define("DB_SERVER", "localhost");
//define("DB_USER", "sally");
// define("DB_PASS", "P@ssword1234");
// define("DB_NAME", "salamanders");

// salamander DataBase on localhost
define("DB_SERVER", "pdb1048.awardspace.net");
define("DB_USER", "4368096_sally");
define("DB_PASS", "P@ssword1234");
define("DB_NAME", "4368096_salamanders");

?>


// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection succeeded
if(mysqli_connect_errno()) {
  $msg = "database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

// 2. Perform database query
$query = "SELECT * FROM salamanders";
$result_set = mysqli_query($connection, $query);

// Test if query succeeded
if (!$result_set) {
  exit("Database query failed.");
}

// 3. Use returned data (if any)
while($subject = mysqli_fetch_assoc($result_set)) {
  echo $salamander["menu_name"] . "<br>";
}

// 4. Release returned data
mysqli_free_result($result_set);

// 5. Close database connection
mysqli_close($connection);

?>
