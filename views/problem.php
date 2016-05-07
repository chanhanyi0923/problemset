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
                <h2><?= $prob_id.". ".$title ?></h2>
            </div>
        </div>
        <div class = "col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_OWNER ?></h3>
            </div>
            <div class="panel-body"><?= $owner ?></div>
        </div>
        </div>
        <div class = "col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_DESC ?></h3>
            </div>
            <div class="panel-body"><?= $desc ?></div>
        </div>
        </div>
        <?php if(check_login()): ?>
        <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_ANS ?></h3>
            </div>
            <div class="panel-body">
            <form class="form" action = "result.php" method = "post">
                <div class = "form-group">
                    <input type = "hidden" name = "pid" value = "<?= $prob_id ?>">
                    <?php if($choice): ?>
                    <?php for($i = 0; $i < count($option); $i ++): ?>
                    <div class = "radio">
                        <label>
                        <input type = "radio" name = "ans" value = "<?= $i + 1 ?>">
                        <?= $option[$i] ?>
                        </label>
                    </div>
                    <?php endfor; ?>
                    <?php else: ?>
                    <input type = "text" name = "ans" class = "form-control" placeholder = "<?= $MSG_ANS ?>">
                    <?php endif; ?>
                </div>
                <div class = "form-group">
                    <button type="submit" class="btn btn-default"><?= $MSG_SUBMIT ?></button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <?php endif; ?>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>