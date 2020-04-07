<?php

session_start();

class Config
{
    private string $user;
    private string $pass;
    private string $db;
    private string $tbl;
    protected $pdo;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
       try {
           $this->user = 'root';
           $this->pass = '';
           $this->db = 'shop';
           $this->pdo = new PDO("mysql:host=localhost;dbname={$this->db};charset=utf8", $this->user, $this->pass);
       } catch (PDOException $e) {
           exit('Error ' . $e->getMessage());
       }
    }

    protected function setTbl($tbl)
    {
        $this->tbl = $tbl;
    }

    protected function selectData($field)
    {
        if (is_array($field)) {
            $fields = implode(",", $field);
            $sql = $this->pdo->prepare("select {$fields} from {$this->tbl}");
        } else {
            $sql = $this->pdo->prepare("select {$field} from {$this->tbl}");
        }
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    protected function insertData($data)
    {
        if (is_array($data)) {
            $field = array_keys($data);
            $fields = implode(',', $field);
            $vals = ':' . implode(',:', $field);
            $sql = $this->pdo->prepare("insert into {$this->tbl} ({$fields}) values ({$vals})");
            foreach ($data as $key => $value) {
                $type = gettype($value);
                switch ($type) {
                    case 'string':
                        $sql->bindParam(":$key", $data[$key]);
                        break;
                    case 'integer':
                        $sql->bindParam(":$key", $data[$key], PDO::PARAM_INT);
                        break;
                    case 'boolean':
                        $sql->bindParam(":$key", $data[$key], PDO::PARAM_BOOL);
                        break;
                }
            }
            $sql->execute();
        }
    }

    protected function updateData($data, $id)
    {
        if (is_array($data)) {
            $field = array_keys($data);
            foreach ($field as $item) {
                $arr[] = $item . '=:' . $item;
            }
            $str = implode(',', $arr);
            $sql = $this->pdo->prepare("update {$this->tbl} set {$str} where id=:id");
            $sql->bindParam(":id", $id, PDO::PARAM_INT);
            foreach ($data as $key => $value) {
                $type = gettype($value);
                switch ($type) {
                    case 'string':
                        $sql->bindParam(":key", $data[$key]);
                        break;
                    case 'integer':
                        $sql->bindParam(":$key", $data[$key], PDO::PARAM_INT);
                        break;
                    case 'boolean':
                        $sql->bindParam(":$key", $data[$key], PDO::PARAM_BOOL);
                        break;
                }
            }
            $sql->execute();
        }
    }

    protected function showData($field, $val)
    {
        $sql = $this->pdo->prepare("select * from {$this->tbl} where $field=:val");
        $type  = gettype($val);
        switch ($type) {
            case 'string':
                $sql->bindParam(":val", $val);
                break;
            case 'integer':
                $sql->bindParam(":val", $val, PDO::PARAM_INT);
                break;
            case 'boolean':
                $sql->bindParam(":val", $val, PDO::PARAM_BOOL);
                break;
        }
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    protected function deleteData($id)
    {
        $sql = $this->pdo->prepare("delete from {$this->tbl} where id=:id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);
        $sql->execute();
    }

    protected function likeData($field, $val, $sort)
    {
        if ($sort == true) {
            $sql = $this->pdo->prepare("select * from {$this->tbl} where $field like '%$val%' order by sort asc");
        } else {
            $sql = $this->pdo->prepare("select * from {$this->tbl} where $field like '%$val%'");
        }
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    protected function extraSql($str)
    {
        $sql = $this->pdo->prepare("{$str}");
        return $sql;
    }
}