<?php

include "admin_ops/ad_op.php"; // include admin system
include 'admin_ops/mysqlsett.php'; // include mysql settings
include "classes.php"; // include helpful classes

// Getters variables from URLS
$ref = $_GET['ref'];
$force = $_GET['force'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Get some global variables

$pages_folder = "fresh/";
$error_msg="MySQL Query error";

$result = $conn->query("SELECT value from page_string_table WHERE stringkey=\"mainpage_title\";");
if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {$mainpage_title = $row[0];} else $mainpage_title=$error_msg;

$result = $conn->query("SELECT value from page_string_table WHERE stringkey=\"footer_text\";");
if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {$footer_text = $row[0];} else $footer_text=$error_msg;

$result = $conn->query("SELECT value from page_string_table WHERE stringkey=\"yt_link\";");
if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {$yt_link = $row[0];} else $yt_link=$error_msg;

$result = $conn->query("SELECT value from page_string_table WHERE stringkey=\"gh_link\";");
if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {$gh_link = $row[0];} else $gh_link=$error_msg;

$result = $conn->query("SELECT value from page_string_table WHERE stringkey=\"li_link\";");
if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {$li_link = $row[0];} else $li_link=$error_msg;

            
if ($ref=="" || $ref=="start") { $actual_page = $pages_folder . "start"; } 
else
{
if (file_exists($pages_folder . $ref)) 
{
    $actual_page = $pages_folder . $ref;
}  
else
{
    $actual_page = $pages_folder . "bob";
}
}





?>