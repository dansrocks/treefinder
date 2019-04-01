<?php

require_once 'vendor/autoload.php';

/**
 * @param string $str1
 * @param string $str2
 *
 * @return int
 */
$compareStrings = function (string $str1, string $str2) {
    $minChars = min(mb_strlen($str1), mb_strlen($str2));
    $changes = levenshtein($str1, $str2);
    $percent = (($minChars - $changes) / $minChars) * 100;

    return intval($percent);
};



$treefinder = new \TreeFinder\TreeFinder($compareStrings, 50);
$coincidences = $treefinder->findCoincidences(
    ['carrot', 'pastilla', 'comanda' ],
    ['comando', 'pastillero', 'carotida' ]
);


print_r($coincidences);



