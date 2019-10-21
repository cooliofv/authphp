<?php

namespace database;

use PDO;
use Exception;


class DB {

    public $connection;

    public function __construct($dbname = 'authphp', $host='localhost', $user='root', $password=''){

        try {

            $this->connection = new PDO("mysql:dbname={$dbname};host={$host}", "{$user}", "{$password}");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $ex){

            echo "Ошибка в БД: ".$ex->getMessage();
        }//try
    }//constructor

    protected function select($cols, $table){

        $query = "SELECT {$cols} FROM {$table}";

        $stmt  = $this->connection->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }//select

    protected function selectWhere($cols, $table, $searchCol="", $searchValue="", $order="", $limit="" ){

        $query = "SELECT {$cols} FROM {$table} WHERE {$searchCol}=:searchvalue";

        $stmt  = $this->connection->prepare($query);

        $stmt->bindParam(':searchvalue',$searchValue, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }//select

    protected function delete($table, $delParam, $delValue){

        $query = "DELETE FROM ${table} WHERE {$delParam}=${delValue}";

        $result = $this->connection->query($query);

        return $result;
    }//delete


}//DB class