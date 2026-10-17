<?php

include_once("config.inc.php");

$link = SQLLib::SelectRow("select * from downloadlinks where type like '%youtube%' order by rand()");
$prod = PouetProd::Spawn($link->prod);
$a = [&$prod];
PouetCollectPlatforms($a);
PouetCollectAwards($a);

header("Content-type: application/json");
echo json_encode(["link" => $link, "prod" => $prod->ToAPI()]); // ToAPI() drops latestip, lastLogin etc.
