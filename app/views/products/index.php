<?php $this->setSiteTitle('Products');?>
<?php $this->start('body');?>
<div class="list-container">
  <table class="table-list">
    <tr>
      <th>Name</th>
      <th>Producer</th>
      <th>Portion</th>
      <th>Energy</th>
      <th>Fat</th>
      <th>Carbohydrates</th>
      <th>Protein</th>
      <th></th>
    </tr>
    <?php foreach($this->products as $product): ?>
      <tr>
        <td><?=$product['name']?></td>
        <td><?=$product['producer']?></td>
        <td><?=$product['portion']?></td>
        <td><?=$product['energy']?></td>
        <td><?=$product['fat']?></td>
        <td><?=$product['carbohydrates']?></td>
        <td><?=$product['protein']?></td>
        <td>
          <a href="<?=PROOT?>products/delete/<?=$product['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">
            <button class="btn-remove"><i class="material-icons color-red">clear</i> Remove</button>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php $this->end();?>
