<?php
/**
 * Database Connection Class
 * Using PDO for secure database operations
 */

class Database {
    private static $instance = null;
    private $connection;
    private $stmt;
    
    /**
     * Private constructor to prevent direct instantiation
     */
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            ];
            
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            $this->logError($e->getMessage());
            die("Database connection failed. Please try again later.");
        }
    }
    
    /**
     * Get singleton instance
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Get PDO connection
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Prepare SQL statement
     */
    public function prepare($sql) {
        $this->stmt = $this->connection->prepare($sql);
        return $this;
    }
    
    /**
     * Bind values to prepared statement
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
        return $this;
    }
    
    /**
     * Execute prepared statement
     */
    private $lastError = '';
    
    public function getLastError() {
        return $this->lastError;
    }
    
    public function execute() {
        try {
            $this->lastError = '';
            return $this->stmt->execute();
        } catch (PDOException $e) {
            $this->lastError = $e->getMessage();
            $this->logError($e->getMessage());
            return false;
        }
    }
    
    /**
     * Fetch single row
     */
    public function fetch() {
        $this->execute();
        return $this->stmt->fetch();
    }
    
    /**
     * Fetch all rows
     */
    public function fetchAll() {
        $this->execute();
        return $this->stmt->fetchAll();
    }
    
    /**
     * Get row count
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }
    
    /**
     * Get last insert ID
     */
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
    
    /**
     * Begin transaction
     */
    public function beginTransaction() {
        return $this->connection->beginTransaction();
    }
    
    /**
     * Commit transaction
     */
    public function commit() {
        return $this->connection->commit();
    }
    
    /**
     * Rollback transaction
     */
    public function rollback() {
        return $this->connection->rollback();
    }
    
    /**
     * Execute query and return result
     */
    public function query($sql, $params = []) {
        $this->prepare($sql);
        
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $this->bind($key, $value);
            }
        }
        
        return $this->fetchAll();
    }
    
    /**
     * Execute query and return single row
     */
    public function queryOne($sql, $params = []) {
        $this->prepare($sql);
        
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $this->bind($key, $value);
            }
        }
        
        return $this->fetch();
    }
    
    /**
     * Insert data into table
     */
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $this->prepare($sql);
        
        foreach ($data as $key => $value) {
            $this->bind(":{$key}", $value);
        }
        
        if ($this->execute()) {
            return $this->lastInsertId();
        }
        return false;
    }
    
    /**
     * Update data in table
     */
    public function update($table, $data, $where, $whereParams = []) {
        $set = [];
        foreach (array_keys($data) as $column) {
            $set[] = "{$column} = :{$column}";
        }
        $set = implode(', ', $set);
        
        $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
        $this->prepare($sql);
        
        foreach ($data as $key => $value) {
            $this->bind(":{$key}", $value);
        }
        
        foreach ($whereParams as $key => $value) {
            $this->bind($key, $value);
        }
        
        return $this->execute();
    }
    
    /**
     * Delete data from table
     */
    public function delete($table, $where, $whereParams = []) {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        $this->prepare($sql);
        
        foreach ($whereParams as $key => $value) {
            $this->bind($key, $value);
        }
        
        return $this->execute();
    }
    
    /**
     * Check if record exists
     */
    public function exists($table, $where, $whereParams = []) {
        $sql = "SELECT COUNT(*) as count FROM {$table} WHERE {$where}";
        $result = $this->queryOne($sql, $whereParams);
        return $result && $result['count'] > 0;
    }
    
    /**
     * Log database errors
     */
    private function logError($message) {
        $logFile = LOGS_PATH . 'database_error.log';
        $timestamp = date('Y-m-d H:i:s');
        $log = "[{$timestamp}] {$message}" . PHP_EOL;
        file_put_contents($logFile, $log, FILE_APPEND);
    }
    
    /**
     * Prevent cloning
     */
    private function __clone() {}
    
    /**
     * Prevent unserialization
     */
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}
