<?php // index.php

    include_once 'header.php';
	
	     echo "<br /><span class='main'>Welcome to Jason's Website,";
		 
     if ($loggedin) echo " $user, you are logged in.";
	 else           echo 'please sign up and/or log in to join.';
	 
?>

   </span><br /><br /></body></html>