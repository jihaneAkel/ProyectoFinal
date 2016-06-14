<?php
session_start();
$_SESSION = array(); session_destroy(); 
echo "bye ";

?>
<meta http-equiv="refresh" content="0;index.php">


