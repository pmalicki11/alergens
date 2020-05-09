<?php $this->setSiteTitle('Login');?>
<?php $this->start('body');?>
<ul>
  <?php foreach($this->errors as $field => $error): ?>
    <li><?=$error?></li>
  <?php endforeach; ?>
</ul>
<form action="<?=PROOT?>auth/register" method="post">
  <table class="form-input">
    <tr>
      <td><label for="login">Username:</label></td>
      <td><input type="text" id="login" name="login" class="form-input-text"></td>
    </tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td><input type="text" id="email" name="email" class="form-input-text"></td>
    </tr>
    <tr>
      <td><label for="password">Password:</label></td>
      <td><input type="password" id="password" name="password" class="form-input-text"></td>
    </tr>
    <tr>
      <td><label for="repassword">Confirm password:</label></td>
      <td><input type="password" id="repassword" name="repassword" class="form-input-text"></td>
    </tr>
    <tr><td class="center" colspan="2"><input type="submit" value="Register" class="btn-submit"></td></tr>
  </table>
</form>
<?php $this->end();?>
