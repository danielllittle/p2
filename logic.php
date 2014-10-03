<?PHP

/*
 * assumed for practical purposed that range of allowed values is [2,10]
 */
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


/*
 * pick a random special character/delimiter from the array of values
 */
function generateSpecialChar()
{

    $special_char_array = array("$", ".", "#", "%", "^", "&", "*", "(", ")", "_");
    $special_char_index = array_rand($special_char_array);
    return $special_char_array[$special_char_index];
}

/*
 * method returns a word in mixed case, boolean $upperCase is required to keep state
 * continuity in the password characters because the mIxEdCaSe pattern continues
 * over multiple words
 */
function formatMixedCase($initialword, $upperCase) {
    $mixedCaseWord = "";

    foreach (str_split($initialword) as $letter) {

        if ($upperCase) {
            $mixedCaseWord .= strtoupper($letter);
        } else {
            $mixedCaseWord .= strtolower($letter);
        }
        $upperCase = !$upperCase; //alternate upper and lower case with each letter

    }
    return $mixedCaseWord;
}

function generatePassword($array)
{
    $cnt = $_POST['numwords'];
    $specialChar = generateSpecialChar(); //special character used for delimiter and appended special character
    $mixedCaseIndex = 0; //used to track index for mIxEdCaSe only

    for ($i = 0; $i < $cnt; $i++) {

        $word = $array[array_rand($array)];
        if ($_POST['case'] == 'UPPER' || (($_POST['case'] == 'altCASE') && $i % 2 == 1))  {
            $word = strtoupper($word);
        } else if ($_POST['case'] == 'camelCase' && $i > 0) {
            $word = ucfirst(strtolower($word));//drop words to lowercase then raise first letter to uppercase after first word
        } else if ($_POST['case'] == 'mIxEdCaSe') { //alternate letters between lower and uppercase, index needed to maintain state of case
            $word = formatMixedCase($word, $mixedCaseIndex % 2 == 1);
            $mixedCaseIndex = $mixedCaseIndex + strlen($word);
        } else {  //default option to lowercase (also, first word in camelCase reaches here)
            $word = strtolower($word);
        }

        echo $word;

        if (($i < $cnt - 1)  && $_POST['adddelimiter']) { //when selected, add delimiter after every word but last
            echo $specialChar;
        }
    }
    if ($_POST['addspecial']) { //append special delimiter when user selects option
        echo $specialChar;
    }if ($_POST['addnumber']) { //append number to end when user select option
        echo rand(0,9);
    }
}

?>
