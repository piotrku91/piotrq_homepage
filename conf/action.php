<?php
$ref = $_GET['ref'];
$force = $_GET['force'];
$pass = $_GET['pass'];
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($pass != "") {
    $sql = "SELECT * from page_string_table WHERE stringkey=\"pass\" AND value=PASSWORD(\"" . $pass . "\")";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result)) {
        echo " PASS OK";

        if ($force = "update") { // Render everything from database to fresh folder
            $sql = "SELECT * from pages";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $myfile = fopen("fresh/" . $row["page"], "w") or die("Unable to open file!");
                    $header = "<h3 class=\"braces\">{</h3><h3>" . $row["title"] . "</h3><h3 class=\"braces\">}</h3><br><br>";
                    $pg_content = $header . $row["content"] . "<br><br>\n";
                    fwrite($myfile, $pg_content);
                    fclose($myfile);
                }
            }
        };
    } else echo " PASS INVALID";;

}

// Get some global variables

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




?>