<?php

$project_root=__DIR__;

$smarty_dir=$project_root.'/smarty/';

require_once ($project_root.'/lib/functions.php');

// put full path to Smarty.class.php
require($smarty_dir.'/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->compile_check = true;
$smarty->debugging = false;

$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir = $smarty_dir.'templates_c';
$smarty->cache_dir = $smarty_dir.'cache';
$smarty->config_dir = $smarty_dir.'configs';

## Подключение к БД.
require_once $project_root."/dbsimple/config.php";
require_once "DbSimple/Generic.php";

//Подключаем библиотеку
require_once ($project_root.'/FirePHP/FirePHP.class.php');
//Инициализируем класс FirePHP
$firePHP = FirePHP::getInstance(true);
//Устанавливаем активность. Если выключить (false), то отладочные сообщения
//не будут отображаться в FireBug
$firePHP ->setEnabled(true);
