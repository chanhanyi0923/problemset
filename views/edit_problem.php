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
                <h3 class="panel-title"><?= $MSG_PROB_INFO ?></h3>
            </div>
            <div class="panel-body">
                <p><?= $MSG_PID." ".$cur_prob_id ?></p>
                <p><?= $MSG_OWNER." ".$owner ?></p>
            </div>
        </div>
        </div>
        <div class = "col-md-12">
        <div class="panel panel-default">
            <div class = "panel-body">
            <form action = "add_problem.php" method = "post">
                <input type="hidden" name = "id" value = "<?= $id ?>">
                <div class = "form-group">
                    <label class = "control-label"><?= $MSG_PROB_TITLE ?></label>
                    <input type="text" name = "title" class="form-control" placeholder="" value = "<?= $title ?>">
                </div>
                <div class="checkbox">
                    <label>
                    <?php if($choice): ?>
                    <input type = "checkbox" name = "choice" value = "1" checked>
                    <?php else: ?>
                    <input type = "checkbox" name = "choice" value = "1">
                    <?php endif; ?>
                    <?= $MSG_CHOICE ?>
                    </label>
                </div>
                <div class = "form-group">
                    <label class = "control-label"><?= $MSG_OPTION ?></label>
                    <input type="text" name = "options" class="form-control" placeholder="" value = "<?= $options ?>">
                </div>
                <div class = "form-group">
                    <label class = "control-label"><?= $MSG_ANS ?></label>
                    <input type="text" name = "ans" class="form-control" placeholder="" value = "<?= $ans ?>">
                </div>
                <div class = "form-group">
                    <label class = "control-label"><?= $MSG_DESC ?></label>
                    <textarea class = "form-control" name = "desc" rows = "3"><?= $desc ?></textarea>
                </div>
                <div class = "form-group">
                    <label class = "control-label"><?= $MSG_DET_ANS ?></label>
                    <textarea class = "form-control" name = "det_ans" rows = "3"><?= $det_ans ?></textarea>
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