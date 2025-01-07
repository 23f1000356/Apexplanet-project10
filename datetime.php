<?php
// Set the timezone
date_default_timezone_set("Asia/Kolkata");

// Get the current date and time
$currentDate = date("Y-m-d");
$currentTime = date("h:i:s A");

// Display the message
echo "<h1>Welcome to My Website</h1>";
echo "<p>Today's Date: $currentDate</p>";
echo "<p>Current Time: $currentTime</p>";
?>
