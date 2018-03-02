<?
define('logFile', 'logs/errors.log');
include 'core/autoloader.php';
    
function checkVar($var) {
        return $var;
    };

try {
    $test = checkVar(0);
    if($test == 0){
        throw new Exception('Неверное значение', 100);
    }
}
catch(Exception $e) {
    echo 'Ошибка: '. $e->getMessage();
    
    $log = new Logger(logFile, $e->getMessage(), $e->getCode());
    $log->writeToLog();
}