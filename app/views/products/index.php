<?php $this->setSiteTitle('Products');?>
<?php $this->start('body');?>
<p>Products Page</p>
<table class="table-std">
  <tr class="tr-std">
    <th class="th-std"></th>
    <th class="th-std">Name</th>
    <th class="th-std">Producer</th>
    <th class="th-std">Portion</th>
    <th class="th-std">Energy</th>
    <th class="th-std">Fat</th>
    <th class="th-std">Carbohydrates</th>
    <th class="th-std">Protein</th>
  </tr>
  <?php foreach($this->products as $product): ?>
    <tr class="tr-std">
      <td class="td-std">
        <a href="<?=PROOT?>products/delete/<?=$product['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">X</a>
      </td>
      <td class="td-std"><?=$product['name']?></td>
      <td class="td-std"><?=$product['producer']?></td>
      <td class="td-std"><?=$product['portion']?></td>
      <td class="td-std"><?=$product['energy']?></td>
      <td class="td-std"><?=$product['fat']?></td>
      <td class="td-std"><?=$product['carbohydrates']?></td>
      <td class="td-std"><?=$product['protein']?></td>
    <tr>
  <?php endforeach; ?>
</table>
<?php $this->end();?>
