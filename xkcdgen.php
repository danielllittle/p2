<!DOCTYPE html>
<?php

error_reporting(E_ALL);

require 'rawlist.php';

require 'logic.php';
?>
<head><title>XKCD Password Generator - CSCI 15 - Project #2</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>

<h1>XKCD Password Generator</h1>

<h2>CSCI 15 - Project #2</h2>

<h2>Daniel Little</h2>

<p>A simple password generator based on the notion that combining memorable words into a phrase is more secure than a
    supposed "s3cure p4$$word." The cartoon below depicts the idea that a string of four random words would be a secure
    password. Click 'Generate Password' to begin generating new XKCD format passwords. Be sure to try selecting
    different options below to customize your password result even futher.</p>

<div>
    <form method="post">
        <fieldset>


            <input type="submit" value="Generate Password"><br>

            <h3><?= generatePassword($array); ?></h3>
            <hr>
            <label for="numwords">Custom Options: </label><br><label for="numwords">Number of
                words: </label>
            <select id="numwords" name="numwords">
                <?php wordOption(); ?>
            </select>
            <label for="case">Case: </label>
            <select name="case">
                <option value="lower" <?php if ($_POST['case'] == 'lower') echo 'selected="selected"'; ?>>lowercase
                </option>
                <option value="UPPER" <?php if ($_POST['case'] == 'UPPER') echo 'selected="selected"'; ?>>UPPERCASE
                </option>

                <option value="camelCase" <?php if ($_POST['case'] == 'camelCase') echo 'selected="selected"'; ?>>
                    camelCase
                </option>
                <option value="altCASE" <?php if ($_POST['case'] == 'altCASE') echo 'selected="selected"'; ?>>
                    alternateCASE
                </option>
            </select><br>
            <label for="addspecial"> Add special character: </label>
            <input name="addspecial" id="addspecial"
                   type="checkbox" <?php if ($_POST['addspecial']) echo 'checked'; ?>>
            <label for="addnumber">Add number: </label>
            <input name="addnumber" id="addnumber"
                   type="checkbox" <?php if ($_POST['addnumber']) echo 'checked'; ?>><br>


        </fieldset>
        <!--select><option>none</option><option>camelCase</option><option></option></select></p></fieldset-->
    </form>
</div>
<br>

<div class="centerImage"><a href="http://xkcd.com/936/"><img class="cartoon" alt="XKCD Comic Strip"
                                                             src="http://imgs.xkcd.com/comics/password_strength.png"></a>
</div>
</body>
</html>