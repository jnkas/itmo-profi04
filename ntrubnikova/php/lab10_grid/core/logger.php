<?php

class Logger {
    public $filePath;
    public $error;
    public $code;
    public $date;
    
    public function __construct($file, $error, $code){
        $this->filePath = $file;
        $this->error = $error;
        $this->code = $code;
        $this->dateTime = date('d-m-Y H:m:s');
    }    
    //Методы
    public function writeToLog(){
        file_put_contents($this->filePath, $this->dateTime. ' Код '. $this->code. ', Ошибка: '. $this->error. "\r\n", FILE_APPEND);
    }
}