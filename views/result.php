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
        <?php if($choice): ?>
        <div class = "col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_OPTION ?></h3>
            </div>
            <div class="panel-body">
                <ol>
                    <?php for($i = 0; $i < count($option); $i ++): ?>
                    <li><?= $option[$i] ?></li>
                    <?php endfor; ?>
                </ol>
            </div>
        </div>
        </div>
        <?php endif; ?>
        <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_ANS ?></h3>
            </div>
            <div class="panel-body"><?= $ans ?></div>
        </div>
        </div>
        <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_SUBMIT_ANS ?></h3>
            </div>
            <div class="panel-body"><?= $submit_ans ?></div>
        </div>
        </div>
        <div class = "col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_RESULT ?></h3>
            </div>
            <div class="panel-body"><?= $result ? "YES" : "NO" ?></div>
        </div>
        </div>
        <div class = "col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $MSG_DET_ANS ?></h3>
            </div>
            <div class="panel-body"><?= $det_ans ?></div>
        </div>
        </div>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <?php require_once("footer.php"); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
