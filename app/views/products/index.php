<?php $this->setSiteTitle('Products');?>
<?php $this->start('body');?>
<p>Products Page</p>
<table>
  <tr>
    <th></th>
    <th>Name</th>
    <th>Producer</th>
    <th>Portion</th>
    <th>Energy</th>
    <th>Fat</th>
    <th>Carbohydrates</th>
    <th>Protein</th>
  </tr>
  <?php foreach($this->products as $product): ?>
    <tr>
      <td>
        <a href="<?=PROOT?>products/delete/<?=$product['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">X</a>
      </td>
      <td><?=$product['name']?></td>
      <td><?=$product['producer']?></td>
      <td><?=$product['portion']?></td>
      <td><?=$product['energy']?></td>
      <td><?=$product['fat']?></td>
      <td><?=$product['carbohydrates']?></td>
      <td><?=$product['protein']?></td>
    <tr>
  <?php endforeach; ?>
</table>
<?php $this->end();?>
