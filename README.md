# P2 Project: xkcd Password Generator

## Live URL
<http://p2.harvardalm.com>

## Description
A utility for generating [xkcd passwords](http://xkcd.com/936/).

## Details for teaching team
No login required.  Project will be presented in section.

The file `rawlist.php` was used to store the scraped array containing over 2000 words.

Delivered the following features:

    1.  user input assigns dynamic number of words  - (Allowed value range 2-10)
    2.  2000+ word list scraped curtesy of paulnoll.com
    3.  user option to include for word delimiter (character is randomly assigned from set {"$", ".", "#", "%", "^", "&", "*", "(", ")", "_"})
    4.  user option to append number to end of password
    5.  user option to append delimiter at end of password (special character is same as delimiter above)
    6.  user option to choose from 5 different case variations
        1. lowercase - all words lowercase (default option)
        2. UPPERCASE - all words uppercase
        3. alternateCASE - each word alternates in case, lowercaseUPPERCASElowercase, etc
        4. camelCase - first word in phrase in lowercase, subequent words are lowercase with first letter only in uppercase
        5. mIxEdCase - alternating case for every letter throughout the phrase

## Outside code
* Word list: http://www.paulnoll.com/Books/Clear-English/

==
