<?php

function connectError(){
    header("Refresh:15; url=install.php");
    exit("Параметры подключения к БД не заданы. Через 15 сек. Вы будете перенаправлены на страницу INSTALL.</br>
         Если автоматического перенаправления не происходит, нажмите <a href='install.php'>здесь</a>.");
}

// Код обработчика ошибок SQL.
function databaseErrorHandler($message, $info){
    // Если использовалась @, ничего не делать.
    if (!error_reporting()) return;
    // Выводим подробную информацию об ошибке.
   //echo "SQL Error: $message<br><pre>"; 
   // print_r($info);
    //echo "</pre>";
    header("Refresh:5; url=install.php");
    exit("Ошибка в работе БД. Через 5 сек. Вы будете перенаправлены на страницу INSTALL.</br>
         Если автоматического перенаправления не происходит, нажмите <a href='install.php'>здесь</a>.");
}

// Код логгера
function myLogger($db, $sql, $caller) {
    global $firePHP;
    if (isset($caller['file'])){
    $firePHP -> group("at ".@$caller['file'].' line '.@$caller['line']);
    }
    $firePHP -> log ($sql);
    if (isset($caller['file'])){
    $firePHP -> groupEnd();
    }
}

// Код обработчика ошибок для инсталлера.
function installErrorHandler()
{
    // Если использовалась @, ничего не делать.
    if (!error_reporting()) return;
    // Выводим подробную информацию об ошибке.
    $_SESSION['success']= FALSE;
    echo "<p>При установке дампа базы данных произошла ошибка.</br>
            Проверьте данные соединения с БД и попробуйте еще раз.</br>
            <a href='install.php'>Вернуться назад</a></p>"; 
    exit();
}

