<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
    <meta name="description" content="">
    
    <meta property="og:url"                content="" />
    <meta property="og:site_name"           content="" />
    <meta property="og:type"               content="" />
    <meta property="og:title"              content="" />
    <meta property="og:description"        content="" />
    <meta property="og:image"              content="" />
    
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('bootstrap/dist/css/bootstrap.min.css') ?>
    
</head>
<body>
    <?= $this->Flash->render('auth') ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <div class="row row-offcanvas row-offcanvas-right">
        <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
