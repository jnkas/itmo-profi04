<?php

class MyPDO extends PDO {

    private $settings;

    public function __construct() {

        $confFile = ROOTDIR . '/vc4-config/db.php';
        $this->settings = include($confFile);

        $dns = $this->settings['default']['type'] .
            ':host=' . $this->settings['default']['host'] .
            ((!empty($this->settings['default']['port'])) ? (';port=' . $this->settings['default']['port']) : '') .
            ';dbname=' . $this->settings['default']['database'] . ';charset=' . $this->settings['default']['charset'];

        parent::__construct($dns, $this->settings['default']['username'], $this->settings['default']['password']);
    }
}
