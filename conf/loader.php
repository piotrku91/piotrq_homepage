<?php

include "admin_ops/ad_op.php"; // include admin system
include 'admin_ops/mysqlsett.php'; // include mysql settings
include "classes.php"; // include helpful classes

// Getters variables from URLS
$ref = $_GET['ref'];
$force = $_GET['force'];

// Create objects
$conn = mysqli_connect($servername, $username, $password, $dbname);
$queryGate = new SQLLoader();
$pageVars = new MainVarsLoader();


// Get some global variables
$mainpage_title = $pageVars->getVar($conn, "mainpage_title", "Strona domowa");
$footer_text = $pageVars->getVar($conn, "footer_text", "Projekt strony w HTML, CSS oraz programowanie w PHP, MySQL wykonane przez PiotrQ");
$yt_link = $pageVars->getVar($conn, "yt_link", "Strona domowa");
$gh_link = $pageVars->getVar($conn, "gh_link", "Strona domowa");
$li_link = $pageVars->getVar($conn, "li_link", "Strona domowa");
$pages_folder = $pageVars->getVar($conn, "pages_folder", "fresh/");

            
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