<?php
$db=new mysqli("localhost","root", "") or die("No Connection");
$db->select_db("fpi-project") or die("No Database connected!");
?>