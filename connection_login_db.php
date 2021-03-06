<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="college_website_db";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    echo "here!";
    die("failed to connect");
}