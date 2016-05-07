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
        <table class = "table">
        <thead>
            <tr>
                <td><?= $MSG_SID ?></td>
                <td><?= $MSG_PROB_SET_TITLE ?></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($prob_set_info as $elem): ?>
            <tr>
                <td><?= $elem["id"] ?></td>
                <td>
                    <a href = "prob_set.php?sid=<?= $elem["id"] ?>"><?= $elem["title"] ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <nav class = "col-md-12">
        <ul class = "pagination pagination-lg">
            <?php if($cur_page > $first_page): ?>
            <li><a href = "<?= $PAGE_NAME ?>?page=<?= $cur_page - 1 ?>">«</a></li>
            <?php else: ?>
            <li><a>«</a></li>
            <?php endif; ?>

            <?php if($first_page < $cur_page - $NAVBAR_PAGE_NUM): ?>
            <li><a>...</a></li>
            <?php endif; ?>

            <?php for($i = max($first_page, $cur_page - $NAVBAR_PAGE_NUM);
                      $i <= min($last_page, $cur_page + $NAVBAR_PAGE_NUM); $i ++): ?>
            <?php if($i == $cur_page): ?>
            <li class = "active"><a><?= $i ?></a></li>
            <?php else: ?>
            <li><a href = "<?= $PAGE_NAME ?>?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endif; ?>
            <?php endfor; ?>

            <?php if($last_page > $cur_page + $NAVBAR_PAGE_NUM): ?>
            <li><a>...</a></li>
            <?php endif; ?>

            <?php if($cur_page < $last_page): ?>
            <li><a href = "<?= $PAGE_NAME ?>?page=<?= $cur_page + 1 ?>">»</a></li>
            <?php else: ?>
            <li><a>»</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    </div> <!-- end of row -->
    </div> <!-- end of container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
