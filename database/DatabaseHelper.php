<?php

class DatabaseHelper {
    private $db;

    public function __construct($dbFilePath) {
        try {
            $this->db = new SQLite3($dbFilePath,SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE, null);
        } catch (Exception $e) {
            die("Failed to open the database: " . $e->getMessage());
        }
    }

    public function createTable($tableName, $columns) {
        $query = "CREATE TABLE IF NOT EXISTS $tableName ($columns)";
        return $this->db->exec($query);
    }

    public function insertData($tableName, $data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
        $stmt = $this->db->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function getData($tableName, $condition = "") {
        $query = "SELECT * FROM $tableName";
        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }
        $result = $this->db->query($query);
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function updateData($tableName, $data, $condition) {
        $columns = "";
        foreach ($data as $key => $value) {
            $columns .= "$key = :$key, ";
        }
        $columns = rtrim($columns, ", ");
        $query = "UPDATE $tableName SET $columns WHERE $condition";
        $stmt = $this->db->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function deleteData($tableName, $condition) {
        $query = "DELETE FROM $tableName WHERE $condition";
        return $this->db->exec($query);
    }

    public function close() {
        $this->db->close();
    }
}
