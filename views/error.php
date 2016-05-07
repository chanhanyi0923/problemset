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
        <p></p>
        <div class = "col-md-12">
            <div class = "alert alert-danger" role = "alert">
                <?= $MSG_ERR_INFO[$err] ?>
            </div>
        </div>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <?php require_once("footer.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
