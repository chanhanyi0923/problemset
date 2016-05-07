<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $MSG_TITLE[$PAGE_NAME] ?></title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once("navbar.php"); ?>
    <div class = "container">
    <div class = "row">
        <div class = "col-md-12">
            <div class = "page-header">
                <h2><?= $MSG_TITLE[$PAGE_NAME] ?></h2>
            </div>
        </div>
        <div class = "col-md-12">
            <?php
            if(check_login()) {
                echo $_SESSION["login"];
                echo " ";
                echo $_COOKIE["userid"];
                echo " ";
                echo $_COOKIE["passwd"];
            } else {
                echo "未登入";
            }
            ?>
        </div>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>