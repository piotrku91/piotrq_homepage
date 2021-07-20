<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainstyle.css">

</head>

<?php

include 'conf/mysqlsett.php';
include 'conf/action.php';
?>

<title><?php echo $mainpage_title ?></title>

<body>
    <div class="center">

        <img src="gfx/pro2.png" class="col-s-1 center" style=" margin-top:16px; margin-bottom:10px;">

        <div class="topnav col-s-2" id="myTopnav">

            <?php

            $sql = "SELECT t1.id, t1.display_name,t1.isSubmenu,t1.page_ref,
            t2.id AS sub_id,t2.display_name AS sub_display_name, t2.page_ref AS sub_page_ref
            FROM web.menu AS t1 
            LEFT JOIN submenus AS t2 
            ON t1.subTableName=t2.subMenuName
            ORDER BY t1.id, sub_id;";

            $result = $conn->query($sql);
            $isClosedSub = true;

            if ($result->num_rows > 0) {
                foreach ($result as $row) {

                    if (!$row["isSubmenu"]) {
                        if (!$isClosedSub) {
                            echo "</div></div>";
                            $isClosedSub = true;
                        };
                        echo  "<a href=\"?ref=" . $row["page_ref"] . "\">" . $row["display_name"] . "</a> ";
                    };


                    if ($row["isSubmenu"]) {
                        if ($isClosedSub) {
                            echo  "<div class=\"dropdown\">";
                            echo  "<button class=\"dropbtn\">" . $row["display_name"] . " ";
                            echo      "<i class=\"fa fa-caret-down\"></i>";
                            echo  "</button>";
                            echo  "<div class=\"dropdown-content\">";
                            $isClosedSub = false;
                        } else {
                        }
                        echo      "<a href=\"?ref=" . $row["sub_page_ref"] . "\">" . $row["sub_display_name"] .  "</a>";
                    }
                }
            } 

            echo "<a href=\"" .$li_link. "\" target=\"_blank\" style=\"margin:0; padding: 6px 6px; float:right; \"><img src=\"gfx/liico.png\"></a>";
            echo "<a href=\"" .$gh_link. "\" target=\"_blank\" style=\"margin:0; padding: 6px 6px; float:right; \"><img src=\"gfx/ghico.png\"></a>";
            echo "<a href=\"" .$yt_link. "\" target=\"_blank\" style=\"margin:0; padding: 6px 6px; float:right; \"><img src=\"gfx/ytico2.png\"></a>";
            ?>

            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>


        <div class="content-page col-s-2"><br><br>

            <?php
            $pages_folder = "fresh/";
            $actual_page = $pages_folder . "start";
            
            if ($ref != "" && file_exists($pages_folder . $ref)) {
                $actual_page = $pages_folder . $ref;
            }
            include $actual_page;
            ?>


        </div>

        <div class="footer col-s-2">
            <p><?php echo ":: ". $footer_text. " ::";  $conn->close(); ?></p>
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