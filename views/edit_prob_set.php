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
        <div class = "col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_PROB_SET_INFO ?></h3>
            </div>
            <div class="panel-body">
                <p><?= $MSG_SID." ".$id ?></p>
                <p><?= $MSG_OWNER." ".$owner ?></p>
            </div>
        </div>
        </div>
        <div class = "col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
            <form action = "add_prob_set.php" method = "post">
                <input type="hidden" name = "id" value = "<?= $id ?>">
                <div class = "form-group">
                    <label class = "control-label"><?= $MSG_PROB_SET_TITLE ?></label>
                    <input type="text" name = "title" class="form-control" placeholder="" value = "<?= $title ?>">
                </div>
                <div class = "form-group">
                    <label class = "control-label"><?= "123用,分隔" ?></label>
                    <input type="text" name = "pid_col" class="form-control" placeholder="" value = "<?= $pid_col ?>">
                </div>
                <div class = "form-group">
                    <button type="submit" class="btn btn-default"><?= $MSG_SUBMIT ?></button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>