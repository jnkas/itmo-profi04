<?php

class DatabaseHandler
{
    private static $_mHandler;

    private function __construct()
    {

    }

    private static function GetHandler()
    {
        $connectionConfig = app()->config('database');
        if (!isset(self::$_mHandler)) {
            try {
                self::$_mHandler = new PDO(
                    'mysql:mysql:host='.$connectionConfig['host'].'port='.$connectionConfig['port'].';dbname='.$connectionConfig['database'],
                    $connectionConfig['username'],
                    $connectionConfig['password'],
                    [
                        PDO::ATTR_PERSISTENT => $connectionConfig['persistency']
                    ]
                );
                self::$_mHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                self::Close();
                trigger_error($e->getMessage(), E_USER_ERROR);
            }
        }
        return self::$_mHandler;
    }

    public static function Close()
    {
        self::$_mHandler = null;
    }

    public static function Execute($sqlQuery, $params = null)
    {
        try {
            $database_handler  = self::GetHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute($params);
        } catch (PDOException $e) {
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }


    public static function GetAll($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC)
    {
        $result = null;
        try {
            $database_handler = self::GetHandler();
            self::Execute("set character_set_client='utf8'");
            self::Execute("set character_set_results='utf8'");

            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute($params);
            $result = $statement_handler->fetchAll($fetchStyle);
        } catch (PDOException $e) {
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        // Return the query results
        return $result;
    }


    public static function GetRow($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC)
    {
        $result = null;
        try {
            $database_handler  = self::GetHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute($params);
            $result = $statement_handler->fetch($fetchStyle);
        } catch (PDOException $e) {
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        return $result;
    }


    public static function GetOne($sqlQuery, $params = null)
    {
        $result = null;
        try {
            $database_handler  = self::GetHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute($params);
            $result = $statement_handler->fetch(PDO::FETCH_NUM);
            $result = $result[0];
        } catch (PDOException $e) {
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        return $result;
    }
}
