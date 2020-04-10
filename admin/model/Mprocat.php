<?php

class Procat extends Uploader
{
    const tbl = "procat_tbl";
    public function addProcat($data) {
        $this->setTbl(self::tbl);
        $this->insertData($data);
    }

    public function listMainChid($arr)
    {
        $this->setTbl(self::tbl);
        $sql = $this->chooseData(['status', 'chid'], true);
        $sql->bindParam(":val1", $arr[0]);
        $sql->bindparam(":val2", $arr[1], PDO::PARAM_INT);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
}

?>