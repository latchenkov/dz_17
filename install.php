<?php
header("Content-type: text/html; Charset=utf-8");
session_start();
require_once ('config.php');
require_once ($project_root.'/lib/install_class.php');

// Расположение файла дампа test.sql
$dump_file=$project_root."/db_backups/test.sql";

// Расположение файла для записи параметров подключения
$file_setting=$project_root."/lib/setting.php";

if (isset($_POST['submit'])) { // если была нажата кнопка
    
    // Создаем новый объект 
    $install_db = new installDataBase($_POST);
    
    // Подключаемся к базе данных
    $db = $install_db->connectDB();
   
    // Удаление всех таблиц из БД
    $install_db->dropTable($db);

    // Парсим файл дампа и удаляем комментарии и пустые строки.
    $query = $install_db->parsingDumpFile($dump_file);

    // Помещаем данные из дампа в БД
    $install_db->putDumpDB($db, $query);

    // Записываем параметры подключения в установочный файл
    $install_db->putSettingFile($file_setting);

    header("Location: install.php");
    exit;
}
if (isset($_SESSION['success'])){
$smarty->assign('success', $_SESSION['success']);
}
session_destroy();
$smarty->display('install.tpl');