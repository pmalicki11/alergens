<?php $this->setSiteTitle('Components');?>
<?php $this->start('body');?>
<p>Add Component Page</p>
<form action="<?=PROOT?>components/add" method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <input type="submit" value="Add"/>
</form>

<?php $this->end();?>
