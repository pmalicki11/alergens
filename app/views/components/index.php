<?php $this->setSiteTitle('Components');?>
<?php $this->start('body');?>
<table class="table-list">
  <tr>
    <th>Name</th>
    <th></th>
  </tr>
  <?php foreach($this->components as $component): ?>
    <tr>
      <td><?=$component['name']?></td>
      <td>
        <a href="<?=PROOT?>components/delete/<?=$component['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">
          <button class="btn-remove"><i class="material-icons color-red">clear</i> Remove</button>
        </a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php $this->end();?>
