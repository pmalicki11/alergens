<?php $this->setSiteTitle('Components');?>
<?php $this->start('body');?>
<p>Components Page</p>
<table>
  <?php foreach($this->components as $component): ?>
    <tr>
      <td>
        <a href="<?=PROOT?>components/delete/<?=$component['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">X</a>
      </td>
      <td><?=$component['name']?></td>
    <tr>
  <?php endforeach; ?>
</table>
<?php $this->end();?>
