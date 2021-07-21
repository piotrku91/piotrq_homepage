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
include $admin->special_include("admin_panel");
echo "<a href=\"" .$li_link. "\" target=\"_blank\" style=\"margin:0; padding: 6px 6px; float:right; \"><img src=\"gfx/liico.png\"></a>";
echo "<a href=\"" .$gh_link. "\" target=\"_blank\" style=\"margin:0; padding: 6px 6px; float:right; \"><img src=\"gfx/ghico.png\"></a>";
echo "<a href=\"" .$yt_link. "\" target=\"_blank\" style=\"margin:0; padding: 6px 6px; float:right; \"><img src=\"gfx/ytico2.png\"></a>";
?>

<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>