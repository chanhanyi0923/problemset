<nav class="navbar navbar-default navbar-static-top">
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?= $MSG_WEB_TITLE ?></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php foreach($nav_info as $elem): ?>
            <?php if($PAGE_NAME == $elem[0]): ?>
            <li class = "active"><a href=<?= $elem[0] ?>><?= $elem[1] ?></a></li>
            <?php else: ?>
            <li><a href=<?= $elem[0] ?>><?= $elem[1] ?></a></li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</nav>