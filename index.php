<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainstyle.css">

</head>

<?php
$servername = "localhost";
$username = "root";
$password = "polska";
$dbname = "web";


$conn = mysqli_connect($servername, $username, $password, $dbname);

?>



    <body>
        <div class="center">


        <img src="gfx/pro2.png" class="col-s-1" style="center margin-top:16px; margin-bottom:10px;">

        <div class="topnav col-s-2" id="myTopnav">

            <?php
            $sql = "SELECT * FROM menu";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["isSubmenu"] == 0) {
                        echo  "<a href=\"#home\">" . $row["display_name"] . "</a> ";
                    } else {
                        echo  "<div class=\"dropdown\">";
                        echo  "<button class=\"dropbtn\">" . $row["display_name"] . " ";
                        echo      "<i class=\"fa fa-caret-down\"></i>";
                        echo  "</button>";
                        echo  "<div class=\"dropdown-content\">";
                        $sql2 = "SELECT * FROM " . $row["subTableName"];
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                echo      "<a href=\"#rr\">" . $row2["display_name"] .  "</a>";
                            }
                        }

                        echo "</div></div>";
                    }
                }
            } else {
                echo "0 results";
            }


            $conn->close();
            ?>



            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>


        <div class="content-page col-s-2"><br><br>
            <h3 class="braces">{</h3>
            <h3>Strona główna</h3>
            <h3 class="braces">}</h3>




            <p>Hover over the "about", "services" or "partners" link to see the sub navigation menu.</p>
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