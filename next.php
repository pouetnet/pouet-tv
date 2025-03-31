<?php
include_once("config.inc.php");

$link = SQLLib::SelectRow("select * from downloadlinks where type like '%youtube%' order by rand()");
$prod = PouetProd::Spawn($link->prod);
$a = array(&$prod);
PouetCollectPlatforms( $a );
PouetCollectAwards( $a );

header("Content-type: application/json");
echo json_encode(array("link"=>$link,"prod"=>$prod));
?>
