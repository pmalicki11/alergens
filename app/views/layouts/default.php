<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/style.css">
    <title><?=$this->getSiteTitle();?></title>
    <?=$this->content('head');?>
  </head>
  <body>
    <h1>Food Registration</h1>
    <ul>
      <li><a href="<?=PROOT?>home/index">Home</a></li>
      <li><a href="<?=PROOT?>products/index">My products</a></li>
      <li><a href="<?=PROOT?>products/add">Add products</a></li>
      <li><a href="<?=PROOT?>components/index">Components</a></li>
      <li><a href="<?=PROOT?>components/add">Add component</a></li>
    </ul>
    <?=$this->content('body');?>
  </body>
</html>
