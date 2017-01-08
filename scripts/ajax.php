<?php
include "../lib/poland_not.php";

if(isset($_GET['poland'])) $str_poland = $_GET['poland'];
$test = new poland_not($str_poland);
echo $test->answer();