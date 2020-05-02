<?php $this->setSiteTitle('Products');?>
<?php $this->start('body');?>
<p>Products Page</p>
<table class="table-list">
  <tr class="tr-list">
    <th class="th-list">Name</th>
    <th class="th-list">Producer</th>
    <th class="th-list">Portion</th>
    <th class="th-list">Energy</th>
    <th class="th-list">Fat</th>
    <th class="th-list">Carbohydrates</th>
    <th class="th-list">Protein</th>
    <th class="th-list"></th>
  </tr>
  <?php foreach($this->products as $product): ?>
    <tr class="tr-list">
      <td class="td-list"><?=$product['name']?></td>
      <td class="td-list"><?=$product['producer']?></td>
      <td class="td-list"><?=$product['portion']?></td>
      <td class="td-list"><?=$product['energy']?></td>
      <td class="td-list"><?=$product['fat']?></td>
      <td class="td-list"><?=$product['carbohydrates']?></td>
      <td class="td-list"><?=$product['protein']?></td>
      <td class="td-list">
        <a href="<?=PROOT?>products/delete/<?=$product['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">
          <button class="btn-remove"><i class="material-icons color-red">clear</i> Remove</button>
        </a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php $this->end();?>
