<?php

/* объединяем get и post через merge */

class Request {
    public $input; //это get и post
    public $server;
    public $session;

    function __construct() {
        $this->input = new Input(); 
        $this->server = new Server();
        $this->session = new Session();
    }
}

class Session {
    private $session;

    function __construct() {
        $this->session = $_SESSION;
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        return $this->session[$key];
    }

    function set($key, $value) {
        $this->session[$key] = $value;
    } 
}

class Input {
    private $input;

    function __construct() {
        $this->input = array_merge($_GET, $_POST);
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        return $this->input[$key];
    }

    function set($key, $value) {
        $this->input[$key] = $value;
    }
}


class Server {
    private $server;

    function __construct() {
        $this->server = $_SERVER;
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        return $this->server[$key];
    }

    function set($key, $value) {
        $this->server[$key] = $value;
    }
}

class Application {
    public $request;
    public $logger;
    public $response;

    function __construct() {
        $this->request = new Request();
    }

    function run() {
        //автозагрузка
    }
}

/*$rq = new Request();
$rq->session->get/set();
$rq->input->get();*/

$app = new Application();
$app->request->input->set(xxx, 1135430);
echo $app->request->input->get(xxx); //$_SERVER['SCRIPT_NAME']


?>
