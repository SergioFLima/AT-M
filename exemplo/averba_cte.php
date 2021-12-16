<?php
require('../classe/ATM.php');
$atm = new ATM();
$atm->usuario = 'user';
$atm->senha = 'senha';
$atm->codigo = 'codigo';
$atm->logar();
$atm->xml = $xml;
$ret = $atm->cte();
print_r($ret);
?>
