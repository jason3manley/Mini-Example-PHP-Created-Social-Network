<?php // functions.php

      $dbhost = 'localhost';              // This will most likely not need any required changing
	  $dbname = 'anexistingdb';          // Modifying these....
	  $dbuser = 'jasonswebsite';        // ...Variables according
	  $dbpass = 'apassword';           // .......To your installation
	  $appname = " Jason's Website";  // ....And the preferences
	  
	  
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

   function createTable($name, $query)
   {
	   querMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	   echo "Table '$name' created or already exist.<br />";
	  
   }
   
   
   function queryMysql($query)
   {
	   $results = mysql_query($query) or die(mysql_error());
	   return $results;
	
   }
   
   function destroySession()
   {
	   $_SESSION=array();
	   
	   if (session_id() != "" || isset($_COOKIE[session_name()]))
	      setcookie(session_name(), '', time()-2592000, '/');
		  
	   session_destroy();
	   
   }
   
   function sanitizeString($var)
   {
	   $var = strip_tags($var);
	   $var = htmlentities($var);
	   $var = stripeslashes($var);
	   return mysql_real_escape_string($var);
   }
   
   function showProfile($user)
   {
	   if (file_exists("$user.jpg"))
	      echo "<img src='$user.jpg' align='left' />";
		  
	  $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
	  
	   if (mysql_num_rows($result))
	   {
		   $row = mysql_fetch_row($result);
		   echo stripslashes($row[1]) . "<br clear=left /><br/>";
	   }
	   
}
   
?>