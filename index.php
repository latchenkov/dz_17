<?php
header("Content-type: text/html; Charset=utf-8");

require_once ('config.php');
require_once ($project_root.'/lib/connection.php'); // Подключаем БД

require ($project_root.'/lib/ads_class.php'); // Подключаем файл с функциями

$instance = AdsStore::getInstance();
$instance->getAllAdsFromDb();


$instance -> prepareForOutDataForm() -> prepareForOutTableRow() -> display();