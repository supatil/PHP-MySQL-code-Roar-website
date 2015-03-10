

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="style.css" />
<title>CSCI50600 roars about the Assignment</title>
</head>
<body>
<div id="wrapper">
<?php
echo '<div class="messages">';
if ($login->errors) {
    foreach ($login->errors as $error) {
        echo '<p class="message">Error: ';
		echo $error;
		echo '</p>';    
    }
}

// show positive messages
if ($login->messages) {
    foreach ($login->messages as $message) {
        echo '<p class="message">';
		echo $message;
		echo '</p>';    
    }
}

if ($registration->errors) {
    foreach ($registration->errors as $error) {
        echo '<p class="message"> Error: ';
		echo $error;
		echo '</p>';    
    }
}

// show positive messages
if ($registration->messages) {
    foreach ($registration->messages as $message) {
        echo '<p class="message"> Warning: ';
		echo $message;
		echo '</p>';    
    }
}
echo '</div>';

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
     include("views/loggednav.php");
	 if(isset($_GET['follow']))
	 {
	 	$nav = explode(',',$_GET['follow']);
	 	$nvcnt = count($nav);
	 	$_SESSION['page_count'] = $nav[0];
	 	$pgcnt = $_SESSION['page_count'];
	
	 }
	elseif(isset($_GET['about']))
	{
		
	}
	 else
	 {
	
	 }
     
	 
    
    

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/nav.php");
    include("views/not_logged_in.php");
    

}
include("body.php");
?>
