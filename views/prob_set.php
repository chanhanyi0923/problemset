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
			<h2><?= $set_id.". ".$title ?></h2>
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
        <table class = "table">
        <thead>
            <tr>
                <td><?= $MSG_PID ?></td>
                <td><?= $MSG_PROB_TITLE ?></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($prob_info as $elem): ?>
            <tr>
                <?php if(!isset($elem["status"])): ?>
                <td><?= $elem["id"] ?></td>
                <?php elseif(check_login() && $elem["status"] == 0): ?>
                <td class = "danger"><?= $elem["id"] ?></td>
                <?php elseif(check_login() && $elem["status"] == 1): ?>
                <td class = "success"><?= $elem["id"] ?></td>
                <?php endif; ?>
                <td>
                    <a href = "problem.php?pid=<?= $elem["id"] ?>"><?= $elem["title"] ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
	</div>
    </div>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
