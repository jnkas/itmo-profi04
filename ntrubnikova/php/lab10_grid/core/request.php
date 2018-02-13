<?php

class Request {
    // Свойства
    public $get;
    public $post;
    public $server;
    public $session;
    public $test;
        
    //Методы
    function __construct(){
        $this->get = new Input();
        $this->post = new Input();
        $this->server = new Server();
        $this->session = new Session();
    }     
}

class Input {
    //Свойства
    private $key;
    public $getArray;
    public $postArray;
    
    //Методы
    function __construct() {
        $this->getArray = $_GET;
        $this->postArray = $_POST;
    }
    
    function readGet($key){
        if (isset($key)){
            return $this->getArray[$key];   
        }
        else {
            return null;
        }
    }
    
    function readPost($key){
        if (isset($key)){
            return $this->postArray[$key];   
        }
        else {
            return null;
        }
    } 
}

class Session {
    //Свойства
    private $key;
    
    //Методы
    function __construct() {
        $this->session = $_SESSION;
    }
    
    function set($value){
        $this->session[$key] = $value;
    }
    
    function get($key){
        if (isset($key)){
            return $this->session[$key];   
        }
        else {
            return null;
        }
    }
}

class Server {
    //Свойства
    private $key;
    
    //Методы
    function __construct() {
        $this->server = $_SERVER;
    }
    
    function get($key){
        if (isset($key)){
            return $this->server[$key];   
        }
        else {
            return null;
        }
    }
}

?>