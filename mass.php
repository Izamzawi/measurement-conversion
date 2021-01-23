<?php

require_once('functions.php');

$from_value = '';
$from_unit = '';
$to_unit = '';
$to_value = '';

if(isset($_POST['submit'])) {
  $from_value = $_POST['from_value'];
  $from_unit = $_POST['from_unit'];
  $to_unit = $_POST['to_unit'];
  
  $to_value = convert_mass($from_value, $from_unit, $to_unit);
}

$mass_options = array(
  "kilograms",
  "grams",
  "milligrams",
  "metric tonnes",
  "ounces",
  "pounds",
  "stones"
);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Convert Mass</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div id="main-content">

      <h1>Convert Mass</h1>
  
      <form action="" method="post">
        
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="number" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
            <?php
            foreach($mass_options as $unit) {
              $opt = optionize($unit);
              echo "<option value=\"{$opt}\"";
              if($from_unit == $opt) { echo " selected"; }
              echo ">{$unit}</option>";
            }
            ?>
          </select>
        </div>
        
        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="number" name="to_value" value="<?php echo float_to_string($to_value); ?>" readonly />&nbsp;
          <select name="to_unit">
            <?php
            foreach($mass_options as $unit) {
              $opt = optionize($unit);
              echo "<option value=\"{$opt}\"";
              if($to_unit == $opt) { echo " selected"; }
              echo ">{$unit}</option>";
            }
            ?>
          </select>
          
          <input type="submit" name="submit" value="Submit" />          
        </div>
        
      </form>
  
      <br />
      <p id="return-link" ><a href="index.php">Return to menu</a></p>
      
    </div>
  </body>
</html>
