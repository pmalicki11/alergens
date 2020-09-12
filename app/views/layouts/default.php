<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=PROOT?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=PROOT?>css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="<?=PROOT?>js/jquery.min.js"></script>
    <title><?=$this->getSiteTitle();?></title>
    <?=$this->content('head');?>
  </head>
  <body>
    <h1>Food Registration</h1>
    <?php include 'menu.php'; ?>
    <?=$this->content('body');?>
  </body>
</html>
