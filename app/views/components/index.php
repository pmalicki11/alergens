<?php $this->setSiteTitle('Components');?>
<?php $this->start('body');?>
<p>Components Page</p>
<table class="table-std">
  <?php foreach($this->components as $component): ?>
    <tr class="tr-std">
      <td class="td-std">
        <a href="<?=PROOT?>components/delete/<?=$component['id']?>" onclick="if(!confirm('Are you sure?')){return false;}">X</a>
      </td>
      <td class="td-std"><?=$component['name']?></td>
    <tr>
  <?php endforeach; ?>
</table>
<?php $this->end();?>
