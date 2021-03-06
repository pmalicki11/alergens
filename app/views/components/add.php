<?php $this->setSiteTitle('Components');?>
<?php $this->start('body');?>
<ul>
  <?php foreach($this->errors as $field => $error): ?>
    <li><?=$error?></li>
  <?php endforeach; ?>
</ul>
<form action="<?=PROOT?>components/add" method="post">
  <table class="form-input">
    <tr>
      <td><label for="name">Name:</label></td>
      <td><input type="text" id="name" name="name"
        value="<?=(isset($_POST['name'])) ? $_POST['name'] : ''?>"
        class="form-input-text<?=(array_key_exists('name', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr><td class="center" colspan="2"><input type="submit" value="Add" class="btn-submit"></td></tr>
  </table>
</form>
<?php $this->end();?>
