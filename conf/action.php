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
                    $header = "<h3 class=\"braces\">{</h3><h3>" . $row["title"] . "</h3><h3 class=\"braces\">}</h3>";
                    $pg_content = $header . $row["content"] . "\n";
                    fwrite($myfile, $pg_content);
                    fclose($myfile);
                }
            }
        };
    } else echo " PASS INVALID";;

}

// Get some global variables

$result = $conn->query("SELECT * from page_string_table WHERE stringkey=\"mainpage_title\";");
if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {$mainpage_title = $row[1];} else $mainpage_title="page";

$result = $conn->query("SELECT * from page_string_table WHERE stringkey=\"footer_text\";");
if (($row = mysqli_fetch_row($result)) && mysqli_num_rows($result)) {$footer_text = $row[1];} else $footer_text="page";




?>