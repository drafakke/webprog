<?php
$ceg = 'Madárkórház Alapítvány';
$fejlec = array(
	'ceg' => $ceg,
	'kep' => 'madarkorhaz_logo.gif',
	'kepalt' => 'logo',
);

$lablec = array(
    'copyright' => '© Copyright ' . date("Y") . '.',
    'ceg' => $ceg
);

// enum LoginStatus {
//     LOGGED_IN = 0,
//     LOGGED_OUT = 1,
//     BOTH = 2
// }

$oldalak = array(
	'/' => array('fajl' => 'fooldal', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Elérhetőség', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Bejelentkezés', 'menun' => array(1,0)),
	'regisztralas' => array('fajl' => 'regisztralas', 'szoveg' => 'Regisztráció', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kijelentkezés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
);

$MAPPA = './images/';
$TIPUSOK = array ('.jpg', '.png');
$MEDIATIPUSOK = array('image/jpeg', 'image/png');
$DATUMFORMA = "Y.m.d. H:i";
$MAXMERET = 500*1024;
?>