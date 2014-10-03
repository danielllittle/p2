<?PHP

define(minWords, 2);
define(maxWords, 10);


function wordOption()
{
    for ($i = minWords; $i <= maxWords; $i++) {
        echo "<option ";
        if ($_POST['numwords'] == $i) {
            echo "selected=\"selected\"";
        }
        echo ">$i</option>";
    }
}


function generateDelimiter()
{

    $special_char_array = array("$", ".", "#", "%", "^", "&", "*", "(", ")", "_");
    $special_char_index = array_rand($special_char_array);
    if ($_POST['addspecial']) {
        return $special_char_array[$special_char_index];
    }
}

function generatePassword($array)
{
    $cnt = $_POST['numwords'];
    $delimiter = generateDelimiter();


    for ($i = 0; $i < $cnt; $i++) {

        echo $array[array_rand($array)];
        if ($i < $cnt - 1) {
            echo $delimiter;
        }
    }
    if ($_POST['addspecial']) {
        echo generateDelimiter();
    }if ($_POST['addnumber']) {
        echo 1;
    }
}

?>
