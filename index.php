<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainstyle.css">

</head>

<?php
include 'conf/loader.php';
?>
<?php
   session_start();
   session_set_cookie_params('3600');
?>

<title><?php echo $mainpage_title ?></title>

<body>
    <div class="center">

        <img src="gfx/pro2.png" class="col-s-1 center" style=" margin-top:16px; margin-bottom:10px;">

        <div class="topnav col-s-2" id="myTopnav">

         <?php include "navibar.php" ?>

        </div>


        <div class="content-page col-s-2"><br><br>

            <?php
            
            include $admin->special_include_if("edit", ($force==""));
            include $admin->special_include_if("text_area_opener", ($force=="edit") || ($force=="save"));
            if (!$admin->isEditMode()) {include $actual_page;} else {echo $admin->special_raw_includer($actual_page);};
            include $admin->special_include_if("text_area_closer", ($force=="edit"));
            
              
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