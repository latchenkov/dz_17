<?php
$file_setting=$project_root."/lib/setting.php";

if (!file_exists($file_setting)){
    connectError();
}

require_once ($file_setting);

if (defined('DB_USER') && defined('DB_PASS') && defined('DB_HOST') && defined('DB_NAME')){
    // Подключаемся к БД.
    if (!isset($db)){
        $db = DbSimple_Generic::connect('mysqli://'.DB_USER.':'.DB_PASS.'@'.DB_HOST.'/'.DB_NAME);
            $db->query("SET NAMES utf8");
    }
    // Устанавливаем обработчик ошибок.
    $db->setErrorHandler('databaseErrorHandler');
    $db->setLogger('myLogger');
}
else{
    connectError();
}
