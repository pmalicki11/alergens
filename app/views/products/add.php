<?php $this->setSiteTitle('Products');?>

<?php $this->start('head');?>

<?php $this->end();?>

<?php $this->start('body');?>

<ul>
  <?php foreach($this->errors as $field => $error): ?>
    <li><?=$error?></li>
  <?php endforeach; ?>
</ul>

<form action="<?=PROOT?>products/add" method="post" id="form">
  <table class="form-input">
    <tr>
      <td><label for="name">Name:</label></td>
      <td><input type="text" id="name" name="name"
        value="<?=(isset($_POST['name'])) ? $_POST['name'] : ''?>"
        class="form-input-text<?=(array_key_exists('name', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr>
      <td><label for="producer">Producer:</label></td>
      <td><input type="text" id="producer" name="producer"
        value="<?=(isset($_POST['producer'])) ? $_POST['producer'] : ''?>"
        class="form-input-text<?=(array_key_exists('producer', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr>
      <td><label for="portion">Portion:</label></td>
    <td><input type="text" id="portion" name="portion"
        value="<?=(isset($_POST['portion'])) ? $_POST['portion'] : ''?>"
        class="form-input-text<?=(array_key_exists('portion', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr>
      <td><label for="energy">Energy:</label></td>
      <td><input type="text" id="energy" name="energy"
        value="<?=(isset($_POST['energy'])) ? $_POST['energy'] : ''?>"
        class="form-input-text<?=(array_key_exists('energy', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr>
      <td><label for="fat">Fat:</label></td>
      <td><input type="text" id="fat" name="fat"
        value="<?=(isset($_POST['fat'])) ? $_POST['fat'] : ''?>"
        class="form-input-text<?=(array_key_exists('fat', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr>
      <td><label for="carbohydrates">Carbohydrates:</label></td>
      <td><input type="text" id="carbohydrates" name="carbohydrates"
        value="<?=(isset($_POST['carbohydrates'])) ? $_POST['carbohydrates'] : ''?>"
        class="form-input-text<?=(array_key_exists('carbohydrates', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr>
      <td><label for="protein">Protein:</label></td>
      <td><input type="text" id="protein" name="protein"
        value="<?=(isset($_POST['protein'])) ? $_POST['protein'] : ''?>"
        class="form-input-text<?=(array_key_exists('protein', $this->errors) ? '-error' : '')?>"></td>
    </tr>
    <tr>
      <td><label for="components">Components:</label></td>
      <td>
        <div class="form-input-text chosen-container" id="chosen-container">
          <ul class="chosen-choices" id="chosen-choices">
            <li class="chosen-search-field">
              <input class="chosen-search-input" id="chosen-search-input" type="text" autocomplete="off">
            </li>
          </ul>
        </div>
        <div class="chosen-dropdown">
          <ul class="chosen-results" id="chosen-results"></ul>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="center"><input type="submit" value="Add" class="btn-submit"></input></td>
    </tr>
  </table>
</form>

<script src="<?=PROOT?>js/products.js"></script>
<?php $this->end();?>
