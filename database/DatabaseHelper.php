<?php

require_once('vendor/autoload.php');

use Ramsey\Uuid\Uuid;

class DatabaseHelper
{
    public static $dbFilePath = "database/database.db";

    private $db;

    public function createTable($tableName, $columns)
    {
        $query = "CREATE TABLE IF NOT EXISTS $tableName ($columns)";
        return $this->db->exec($query);
    }

    public function insertData($tableName, $data)
    {
        if (!array_key_exists("id", $data) || empty($data["id"]))
            $data["id"] = Uuid::uuid4()->toString();

        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
        $stmt = $this->db->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function getData($tableName, $condition = [])
    {
        $query = "SELECT * FROM $tableName";
        if (!empty($condition)) {
            $query .= " WHERE";
            foreach ($condition as $key => $value) {
                if (is_array($value)) {
                    $index = 0;
                    foreach ($value as $el) {
                        $query .= " $key = :{$key}_{$index} OR";
                        $index++;
                    }
                } else {
                    $query .= " $key = :$key AND";
                }
            }
            $query = rtrim($query, " AND");
            $query = rtrim($query, " OR");
        }

        $stmt = $this->db->prepare($query);
        foreach ($condition as $key => $value) {
            if (is_array($value)) {
                $index = 0;
                foreach ($value as $elKey => $elValue) {
                    $stmt->bindValue("{$key}_{$index}", $elValue, SQLITE3_TEXT);
                    $index++;
                }
            } else {
                $stmt->bindParam(":$key", $value, SQLITE3_TEXT);
            }
        }

        $result = $stmt->execute();
        $data = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }

    public function updateData($tableName, $data, $condition)
    {
        $columns = "";
        foreach ($data as $key => $value) {
            $columns .= "$key = :$key, ";
        }
        $columns = rtrim($columns, ", ");
        $query = "UPDATE $tableName SET $columns WHERE";
        foreach ($condition as $key => $value) {
            $query .= " $key = :$key AND";
        }
        $query = rtrim($query, ' AND');

        $stmt = $this->db->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":" . $key, $value, SQLITE3_TEXT);
        }
        foreach ($condition as $key => $value) {
            $stmt->bindValue(":" . $key, $value, SQLITE3_TEXT);
        }
        return $stmt->execute();
    }

    public function deleteData($tableName, $condition)
    {
        $query = "DELETE FROM $tableName WHERE true";
        foreach ($condition as $key => $value) {
            $query .= " AND $key = :$key";
        }

        $stmt = $this->db->prepare($query);
        foreach ($condition as $key => $value) {
            $stmt->bindValue(":" . $key, $value, SQLITE3_TEXT);
        }
        $stmt->execute();
    }

    public function open()
    {
        try {
            $this->db = new SQLite3(DatabaseHelper::$dbFilePath, SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE, null);
        } catch (Exception $e) {
            die("Failed to open the database: " . $e->getMessage());
        }
    }

    public function close()
    {
        $this->db->close();
    }
}
