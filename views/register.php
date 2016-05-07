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
            <form class="form-horizontal" action = "register.php" method = "post">
                <div class = "form-group">
                    <label class = "col-sm-4 control-label"><?= $MSG_USERID ?></label>
                    <div class = "col-sm-8">
                        <input type = "text" name = "userid" class = "form-control" placeholder = "<?= $MSG_USERID ?>">
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-sm-4 control-label"><?= $MSG_NICKNAME ?></label>
                    <div class = "col-sm-8">
                        <input type="text" name = "nickname" class = "form-control" placeholder = "<?= $MSG_NICKNAME ?>">
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-sm-4 control-label"><?= $MSG_PASSWD ?></label>
                    <div class = "col-sm-8">
                        <input type="password" name = "passwd" class = "form-control" placeholder = "<?= $MSG_PASSWD ?>">
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-sm-4 control-label"><?= $MSG_RPTPASSWD ?></label>
                    <div class = "col-sm-8">
                        <input type="password" name = "rptpasswd" class = "form-control" placeholder = "<?= $MSG_RPTPASSWD ?>">
                    </div>
                </div>
                <div class = "form-group">
                    <label class = "col-sm-4 control-label"><?= $MSG_EMAIL ?></label>
                    <div class = "col-sm-8">
                        <input type="email" name = "email" class = "form-control" placeholder = "<?= $MSG_EMAIL ?>">
                    </div>
                </div>
                <div class = "form-group">
                    <div class = "col-sm-offset-4 col-sm-8">
                        <button type = "submit" class = "btn btn-default"><?= $MSG_SUBMIT; ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>