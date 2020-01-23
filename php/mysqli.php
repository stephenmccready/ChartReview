<?php
$connect = mysqli_connect("host", "user", "password", "databasename");
if(mysqli_connect_errno()){echo '<p>Connection to MySQL server [host] failed: '.mysqli_connect_error().'</p>';}
