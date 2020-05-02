<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=PROOT?>css/style.css" rel="stylesheet" type="text/css">
    <title><?=$this->getSiteTitle();?></title>
    <?=$this->content('head');?>
  </head>
  <body>
    <h1>Food Registration</h1>
    <ul>
      <li><a href="<?=PROOT?>home/index">Home</a></li>
      <li><a href="<?=PROOT?>products/index">Products</a></li>
      <li><a href="<?=PROOT?>products/add">Add product</a></li>
      <li><a href="<?=PROOT?>components/index">Components</a></li>
      <li><a href="<?=PROOT?>components/add">Add component</a></li>
    </ul>
    <?=$this->content('body');?>
  </body>
</html>
