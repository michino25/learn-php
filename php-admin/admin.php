<?php session_start(); ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf£-8" />
    <title>Untitled Document</title>
</head>

<body>
    <div id="container">
        <div id="banner"><?php include_once "login_status.php"; ?></div>
        <div id="left_menu">
            <?php
            include_once "admin_left_menu.php";
            ?>
        </div>
        <div id="content">
            <?php
            include_once "admin_content.php";
            ?>
        </div>
        <br style="clear:both;">
        <div id="footer"></div>
    </div>
    <style>
        body {
            margin: 0px;
        }

        #container {
            width: 1000px;
            margin: Opx auto;
        }

        #banner {
            height: 150px;
            background-color: #096;
        }

        #fleft_menu {
            width: 265px;
            background-color: #960;
            float: left;
            margin-right: 5px;
        }

        #content {
            width: 730px;
            background-color: #660;
            float: left;
        }

        #footer {
            height: 100px;
            background-color: black;
        }

        .menu_item {
            background-color: lime;
            padding: 5px;
        }

        .menu_item:hover {
            background-color: yellow;
        }

        a:visited,
        a:link {
            color: #630;
        }

        a:hover {
            color: blue;
        }
    </style>
</body>

</html>