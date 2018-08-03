<?php
if (array_key_exists('source', $_GET)) {
  header('Content-Type: text/plain; charset=utf-8');
  echo file_get_contents(__FILE__);
  die();
}

session_start();
header('Content-Type: text/plain; charset=utf-8');

echo <<<EOQ
CREATE TABLE `users` ( 
  `username` varchar(64) DEFAULT NULL, 
  `password` varchar(64) DEFAULT NULL 
);

Endpoints:

 - POST /?username=<username>&password=<password>

Goal:

 - What is the password of the user "admin"

You can check the source code: /index.php?source
EOQ;

if(array_key_exists("username", $_REQUEST)) { 
    $link = mysql_connect('localhost', 'admin', 'admin'); 
    mysql_select_db('chp_pwn', $link); 

    $query = "SELECT * from users where username=\"".$_REQUEST["username"]."\""; 

    echo "Executing query: $query\n";

    $res = mysql_query($query, $link); 
    if($res) { 
      if(mysql_num_rows($res) > 0) { 
          // echo "This user exists.<br>";
      } else { 
          // echo "This user doesn't exist.<br>";
      }
    } else { 
        // echo "Error in query.<br>";
    }

    mysql_close($link); 
}
