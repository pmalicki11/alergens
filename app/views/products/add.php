<?php $this->setSiteTitle('Products');?>
<?php $this->start('body');?>
<p>Add Product Page</p>

<ul>
  <?php foreach($this->errors as $error): ?>
    <li><?=$error?></li>
  <?php endforeach; ?>
</ul>

<form action="<?=PROOT?>products/add" method="post">

  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>

  <label for="producer">Producer:</label><br>
  <input type="text" id="producer" name="producer"><br>

  <label for="portion">Portion:</label><br>
  <input type="text" id="portion" name="portion"><br>

  <label for="energy">Energy:</label><br>
  <input type="text" id="energy" name="energy"><br>

  <label for="fat">Fat:</label><br>
  <input type="text" id="fat" name="fat"><br>

  <label for="carbohydrates">Carbohydrates:</label><br>
  <input type="text" id="carbohydrates" name="carbohydrates"><br>

  <label for="protein">Protein:</label><br>
  <input type="text" id="protein" name="protein"><br>

  <input type="submit" value="Add"/>
</form>
<?php $this->end();?>
