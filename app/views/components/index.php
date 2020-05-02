<?php $this->setSiteTitle('Components');?>
<?php $this->start('body');?>
<p>Components Page</p>
<table class="table-list">
  <tr class="tr-list">
    <th class="th-list">Name</th>
    <th class="th-list"></th>
  </tr>
  <?php foreach($this->components as $component): ?>
    <tr class="tr-list">
      <td class="td-list"><?=$component['name']?></td>
      <td class="td-list">
        <a href="<?=PROOT?>components/delete/<?=$component['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">
          <button class="btn-remove"><i class="material-icons color-red">clear</i> Remove</button>
        </a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php $this->end();?>
