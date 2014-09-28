<!DOCTYPE html>
<?php

error_reporting(E_ALL);

require 'rawlist.php';

define(minWords , 2);
define(maxWords , 10);

function wordOption() {
    for ($i=minWords; $i<=maxWords; $i++) {
        echo "<option ";
        if ($_POST['numwords'] == $i) {
            echo "selected=\"selected\"";
        }
        echo ">$i</option>";
    }
}


function generateDelimiter() {

    $special_char_array = array("$",".","#", "%", "^", "&", "*", "(", ")", "_");
    $special_char_index = array_rand($special_char_array);
    if ($_POST['addspecial']) {
        return $special_char_array[$special_char_index];
    }
}

function generatePassword($array) {
    $cnt = $_POST['numwords'];
    $delimiter = generateDelimiter();


    for($i = 0 ; $i < $cnt ; $i++) {

        echo $array[array_rand($array)];
        if ($i < $cnt - 1) {
            echo $delimiter;
        }
    }
}
?>

<html xmlns="http://www.w3.org/1999/html">
<head><title>XRCD Password Generator - CSCI 15 - Project #2</title></head><body>
<h1>XRCD Password Generator</h1>

<form method="post">
    <fieldset>

        <label id="password" ><?=generatePassword($array);?></label>
        <label for="numwords">Number of Words: </label><select id="numwords" name="numwords">
            <?php wordOption();?>
        </select></p>
        <label for="addspecial"> Add special characters: </label><input name="addspecial" id="addspecial" type="checkbox" <?php if ($_POST['addspecial']) echo 'checked';?>>
        <label for="addnumber">Add Number: </label><input name="addnumber" id="addnumber" type="checkbox" <?php if ($_POST['addnumber']) echo 'checked'; ?>>
        <input type="submit">
    </fieldset>
</form>
</body>
</html>