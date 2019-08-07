<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?=$this->getSiteTitle();?></title>
    <?=$this->content('head');?>
  </head>
  <body>
    <h1>Food Registration</h1>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">My products</a></li>
      <li><a href="#">Add products</a></li>
      <li><a href="#">Components</a></li>
    </ul>
    <?=$this->content('body');?>
  </body>
</html>
