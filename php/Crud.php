<?php
include("Connection.php");

class Crud extends Connection {

    // Attributes
    private $crud;
    private $counter;

    // Prepared statements
    private function preparedStatements($query, $params) {
        $this->countParams($params);
        $this->crud = $this->connectDB()->prepare($query);

        if ($this->counter > 0) {
            for ($i = 1 ; $i <= $this->counter ; $i++) {
                $this->crud->bindValue($i, $params[$i-1]);
            }
        }
        $this->crud->execute();
    }

    // Count parameters
    private function countParams($params) {
        $this->counter=count($params);
    }

    // Insert data into database
    public function insertDB($table, $condition, $params) {
        $this->preparedStatements("insert into {$table} values ({$condition})", $params);
        return $this->crud;
    }

    // Select data from the database
    public function selectDB($fields, $table, $condition, $params) {
        $this->preparedStatements("select {$fields} from {$table} {$condition}", $params);
        return $this->crud;
    }

    // Update data from the database
    public function updateDB($table, $set, $condition, $params) {
        $this->preparedStatements("update {$table} set {$set} where {$condition}", $params);
        return $this->crud;
    }

    // Delete data from the database
    public function deleteDB($table, $condition, $params) {
        $this->preparedStatements("delete from {$table} where {$condition}" , $params);
        return $this->crud;
    }

}