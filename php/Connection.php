<?php
require "Config.php";
class Connection {
    // Initialize database connection
    public function connectDB() {
        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", "".DB_USER."", "".DB_PASS."");
            return $conn;
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }
}