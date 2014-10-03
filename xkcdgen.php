<!DOCTYPE html>
<?php

error_reporting(E_ALL);

require 'rawlist.php';

require 'logic.php';
?>
<html xmlns="http://www.w3.org/1999/html">
<head><title>XKCD Password Generator - CSCI 15 - Project #2</title></head><body>
<link rel="stylesheet" href="styles.css" type="text/css" />
<h1>XKCD Password Generator</h1>
<h2>CSCI 15 - Project #2</h2>
<h2>Daniel Little</h2>
<p>A simple password generator based on the notion that combining memorable words into a phrase is more secure than a supposed "s3cure p4$$word."  The cartoon below depicts the idea that a string of four random words would be a secure password.    Click 'Generate Password' to begin generating new XKCD format passwords.   Be sure to try selecting different options below to customize your password result even futher.</p>
<div><form method="post">
    <fieldset>



        <input type="submit" value="Generate Password"><br>
        <h3><?=generatePassword($array);?></h3><hr>
        <label align="left" for="numwords">Options: </label><label for="numwords">Number of Words: </label>
        <select id="numwords" name="numwords">
            <?php wordOption();?>
        </select>
        <nobr> <label for="addspecial"> Add special characters: </label>
            <input name="addspecial" id="addspecial" type="checkbox" <?php if ($_POST['addspecial']) echo 'checked';?>></nobr>
        <label for="addnumber">Add Number: </label>
        <input name="addnumber" id="addnumber" type="checkbox" <?php if ($_POST['addnumber']) echo 'checked'; ?>>
    </fieldset>
    <!--select><option>none</option><option>camelCase</option><option></option></select></p></fieldset-->
</form>
</div>
<br>
<div class="centerImage"><a href="http://xkcd.com/936/"><img class="cartoon" src="http://imgs.xkcd.com/comics/password_strength.png"></a></div>
</body>
</html>