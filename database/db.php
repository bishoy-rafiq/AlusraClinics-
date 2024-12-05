<?php
session_start();

define('RESULTS_PER_PAGE', 5);
$page = isset($_GET['page']) ? $_GET['page'] : 1;

class db {
    private $host = "localhost";
    private $dbname = "3alamah_db";
    private $user = "u882876176_ebtesam";
    private $port = 3306;
    private $password = "kl,erf45t689o3#E(##(";
    private $connection = "";

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port";
        $this->connection = new PDO($dsn, $this->user, $this->password);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function get_data($table, $columns = "*", $condition = null, $page = 1)
    {
        $offset = (max($page, 1) - 1) * RESULTS_PER_PAGE;

        $query = "SELECT $columns FROM `$table`";
        if ($condition) {
            $query .= " WHERE $condition";
        }
        $query .= " LIMIT $offset, " . RESULTS_PER_PAGE;

        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($table, $columns = "*", $condition = null)
    {

        $query = "SELECT $columns FROM `$table`";
        if ($condition) {
            $query .= " WHERE $condition";
        }
        
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData($table, $cols, $values)
    {
        $sql = "INSERT INTO $table ($cols) VALUES ($values)";

        try {
            $result = $this->connection->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                $_SESSION['Error'] = "<p class='error'> موجودة بالفعل.</p>";
            } else {
                $_SESSION['Error'] = "<p class='error'>حدث خطأ أثناء الإضافة</p>";
                return false;
            }
        } catch (Exception $e) {
            $_SESSION['Error'] = "<p class='error'>حدث خطأ: " . $e->getMessage() . ".</p>";
            return false;
        }
    }

    public function update_data($table, $data, $condition)
    {
        return $this->connection->query("update $table set $data where $condition");
    }

    public function updateData($table, $data, $condition)
    {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
        }
        $setClause = rtrim($setClause, ', ');

        $sql = "UPDATE $table SET $setClause WHERE $condition";

        $stmt = $this->connection->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $result = $stmt->execute();

        return $result;
    }


    public function delete_data($table, $condition)
    {
        return $this->connection->query("delete from $table where $condition");
    }
}

?>
