<?php 

// Initialize an URL to the variable 
$url = "https://www.geeksforgeeks.org"; 

// Use get_headers() function 
print_r(@get_headers($url)); 
die();

// Use condition to check the existence of URL 
if($headers && strpos( $headers[0], '200')) { 
	$status = "URL Exist"; 
} 
else { 
	$status = "URL Doesn't Exist"; 
} 

// Display result 
echo($status); 

?> 
