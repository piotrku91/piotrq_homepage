<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainstyle.css">

</head>

<?php
$ref = $_GET['ref'];
include 'data/mysqlsett.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

?>

<title><?php $ref ?></title>

<body>
    <div class="center">


        <img src="gfx/pro2.png" class="col-s-1 center" style=" margin-top:16px; margin-bottom:10px;">

        <div class="topnav col-s-2" id="myTopnav">

            <?php

            $sql = "SELECT t1.id, t1.display_name,t1.isSubmenu,t1.page_ref,
            t2.display_name AS sub_display_name, t2.page_ref AS sub_page_ref
            FROM web.menu AS t1 
            LEFT JOIN submenus AS t2 
            ON t1.subTableName=t2.subMenuName
            ORDER BY t1.id;";

            $result = $conn->query($sql);
            $isClosedSub = true;

            if ($result->num_rows > 0) {
                foreach ($result as $row) {

                    if ($row["isSubmenu"] == 0) {
                        if (!$isClosedSub) {
                            echo "</div></div>";
                            $isClosedSub = true;
                        };
                        echo  "<a href=\"?ref=" . $row["page_ref"] . "\">" . $row["display_name"] . "</a> ";
                    };


                    if ($row["isSubmenu"] == 1) {
                        if ($isClosedSub) {
                            echo  "<div class=\"dropdown\">";
                            echo  "<button class=\"dropbtn\">" . $row["display_name"] . " ";
                            echo      "<i class=\"fa fa-caret-down\"></i>";
                            echo  "</button>";
                            echo  "<div class=\"dropdown-content\">";
                            $isClosedSub = false;
                        } else {
                            echo      "<a href=\"?ref=" . $row["page_ref"] . "\">" . $row["sub_display_name"] .  "</a>";
                        }
                    }
                }
            } else {
                echo "Tabele menu są puste.";
            }


            $conn->close();
            ?>



            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>


        <div class="content-page col-s-2"><br><br>
            <h3 class="braces">{</h3>
            <h3>Strona główna</h3>
            <h3 class="braces">}</h3>




            <p>Witam serdecznie :)</p>
        </div>

        <div class="footer col-s-2">

            <p>page by PiotrQ</p>
        </div>

    </div>/<div>

    </div>


    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav col-s-2") {
                x.className += " responsive";
            } else {
                x.className = "topnav col-s-2";
            }
        }
    </script>
</body>

</html>