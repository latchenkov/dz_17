<?php

class installDataBase {
    private $db_user;
    private $db_password;
    private $db_host;
    private $db_name;
    
    function __construct(array $param) {
        $this->db_user = trim($param['db_user']);
        $this->db_password=trim($param['db_password']);
        $this->db_host=trim($param['db_host']);
        $this->db_name=trim($param['db_name']);
    }

    public function connectDB() {
        
        // Подключаемся к БД.
        $db = DbSimple_Generic::connect("mysqli://{$this->db_user}:{$this->db_password}@{$this->db_host}/{$this->db_name}");
        $db->query("SET NAMES utf8");

        // Устанавливаем обработчик ошибок.
        $db->setErrorHandler('installErrorHandler');
        $db->setLogger('myLogger');
    
        return $db;
    }
    
    public function dropTable(DbSimple_Database $db) {// Удаление всех таблиц из БД
        $res=$db->selectCol("SHOW TABLES FROM ?#", $this->db_name);
            if (!empty($res)){
                $db->query("SET foreign_key_checks = 0");
                $db->query("DROP TABLE ?# ", array_values($res));
            }
    }
    
    public function parsingDumpFile($dump_file) {// Парсим файл дампа и удаляем комментарии и пустые строки.
        
        if (file_exists($dump_file)){
            $file=file($dump_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                $c = count($file);
                for( $i = 0; $i < $c; $i++){
                    if(substr(trim($file[$i]),0,2) == '--'){
                        unset($file[$i]);
                    }
                }
        $query = explode(';', implode ($file));
        return $query; 
        }
        else {
            installErrorHandler();
        }
    }
    
    public function putDumpDB(DbSimple_Database $db, array $query) {// Выполняем запросы из дампа БД
        foreach ($query as $v){
            if (!empty($v)){
                $db->query($v);
            }
        }
    }
    
    public function putSettingFile($file_setting) { // Записываем параметры подключения в установочный файл
        $string =
            "<?php \r\n"
                . "define('DB_USER','" .  $this->db_user . "'); \r\n"
                . "define('DB_PASS','" .  $this->db_password . "'); \r\n"
                . "define('DB_HOST','" .  $this->db_host . "'); \r\n"
                . "define('DB_NAME','" .  $this->db_name . "'); \r\n";
        if(!file_put_contents($file_setting, $string)) { installErrorHandler(); }
            $_SESSION['success']= TRUE;
    }
}

