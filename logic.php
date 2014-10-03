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


function generateSpecialChar()
{

    $special_char_array = array("$", ".", "#", "%", "^", "&", "*", "(", ")", "_");
    $special_char_index = array_rand($special_char_array);
    return $special_char_array[$special_char_index];
}

function generatePassword($array)
{
    $cnt = $_POST['numwords'];
    $specialChar = generateSpecialChar();


    for ($i = 0; $i < $cnt; $i++) {

        $word = $array[array_rand($array)];
        if ($_POST['case'] == 'UPPER' || (($_POST['case'] == 'altCASE') && $i % 2 == 1))  {
            $word = strtoupper($word);
        } else if ($_POST['case'] == 'camelCase' && $i > 0) {
            $word = ucfirst(strtolower($word));
        } else {
            $word = strtolower($word);
        }

        echo $word;

        if (($i < $cnt - 1)  && $_POST['adddelimiter']) {
            echo $specialChar;
        }
    }
    if ($_POST['addspecial']) {
        echo $specialChar;
    }if ($_POST['addnumber']) {
        echo rand(0,9);
    }
}

?>
