<?php
include './core/config.php';
//Class providing generic data access functionality
//$result = DatabaseHandler::GetAll('select * from auth where id= :id', ['id'=>100]);

class DatabaseHandler {
    private static $_mHandler;
    private function __construct() {}

    private static function GetHandler() {
        if (!isset(self::$_mHandler)) {
            try {
                // Create a new PDO class instance
                self::$_mHandler = 	new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_PERSISTENT => DB_PERSISTENCY));
                // Configure PDO to throw exceptions
                self::$_mHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){ 
                // Close the database handler and trigger an error
                self::Close();
                trigger_error($e->getMessage(), E_USER_ERROR);
            }
        }
        // Return the database handler
        return self::$_mHandler;
    }
//---------------------------------------------------------------------------------------------------------------------
    // Clear the PDO class instance
    public static function Close() {
        self::$_mHandler = null;
    }
//---------------------------------------------------------------------------------------------------------------------
    // Wrapper method for PDOStatement::execute()
    public static function Execute($sqlQuery, $params = null) {
        // Try to execute an SQL query or a stored procedure
        try {
            // Get the database handler
            $database_handler = self::GetHandler();
            // Prepare the query for execution
            $statement_handler = $database_handler->prepare($sqlQuery);
            // Execute query
            $statement_handler->execute($params);
        } catch(PDOException $e) {
            // Trigger an error if an exception was thrown when executing the SQL query
            // Close the database handler and trigger an error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }
//---------------------------------------------------------------------------------------------------------------------
    // Wrapper method for PDOStatement::fetchAll()
    public static function GetAll($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC) {
        // Initialize the return value to null
        $result = null;
        // Try to execute an SQL query or a stored procedure
        try {
            // Get the database handler
            $database_handler = self::GetHandler();
            // Prepare the query for execution
            self::Execute("set character_set_client='utf8'");
            self::Execute("set character_set_results='utf8'");

            $statement_handler = $database_handler->prepare($sqlQuery);
            // Execute the query
            $statement_handler->execute($params);
            // Fetch result
            $result = $statement_handler->fetchAll($fetchStyle);
        } catch(PDOException $e) {
            // Trigger an error if an exception was thrown when executing the SQL query
            // Close the database handler and trigger an error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        // Return the query results
        return $result;
    }
//---------------------------------------------------------------------------------------------------------------------
    // Wrapper method for PDOStatement::fetch()
    public static function GetRow($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC) {
        // Initialize the return value to null
        $result = null;
        // Try to execute an SQL query or a stored procedure
        try {
            // Get the database handler
            $database_handler = self::GetHandler();
            // Prepare the query for execution
            $statement_handler = $database_handler->prepare($sqlQuery);
            // Execute the query
            $statement_handler->execute($params);
            // Fetch result
            $result = $statement_handler->fetch($fetchStyle);
        } catch(PDOException $e) {
            // Trigger an error if an exception was thrown when executing the SQL query
            // Close the database handler and trigger an error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        // Return the query results
        return $result;
    }
//---------------------------------------------------------------------------------------------------------------------
    // Return the first column value from a row
    public static function GetOne($sqlQuery, $params = null) {
        // Initialize the return value to null
        $result = null;
        // Try to execute an SQL query or a stored procedure
        try {
            // Get the database handler
            $database_handler = self::GetHandler();
            // Prepare the query for execution
            $statement_handler = $database_handler->prepare($sqlQuery);
            // Execute the query
            $statement_handler->execute($params);
            // Fetch result
            $result = $statement_handler->fetch(PDO::FETCH_NUM);
            /* Save the first value of the result set (first column of the first row)
            to $result */
            $result = $result[0];
        } catch(PDOException $e) {
            // Trigger an error if an exception was thrown when executing the SQL query
            // Close the database handler and trigger an error
            self::Close();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        // Return the query results
        return $result;
    }
}
?>