<?php $this->setSiteTitle('Login');?>
<?php $this->start('body');?>
<ul>
  <?php foreach($this->errors as $field => $error): ?>
    <li><?=$error?></li>
  <?php endforeach; ?>
</ul>
<form action="<?=PROOT?>auth/login" method="post">
  <table class="form-input">
    <tr>
      <td><label for="username">Username:</label></td>
      <td><input type="text" id="username" name="username" class="form-input-text"></td>
    </tr>
    <tr>
      <td><label for="password">Password:</label></td>
      <td><input type="password" id="password" name="password" class="form-input-text"></td>
    </tr>
    <tr><td class="center" colspan="2"><input type="submit" value="Login" class="btn-submit"></td></tr>
    <tr><td class="center" colspan="2"><p>Don't have account?<br><a href="<?=PROOT?>auth/register">Register!</a></p></td></tr>
  </table>
</form>
<?php $this->end();?>
