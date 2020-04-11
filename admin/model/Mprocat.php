<?php

class Procat extends Uploader
{
    const tbl = "procat_tbl";
    public final function addProcat($data) {
        $this->setTbl(self::tbl);
        $this->insertData($data);
    }

    public final function listMainChid($arr)
    {
        $this->setTbl(self::tbl);
        $sql = $this->chooseData(['status', 'chid'], true);
        $sql->bindParam(":val1", $arr[0]);
        $sql->bindparam(":val2", $arr[1], PDO::PARAM_INT);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public final function listProcat()
    {
        $this->setTbl(self::tbl);
        $row = $this->selectData('*');
        return $row;
    }

    public final function showMainChid($chid) {
        $this->setTbl(self::tbl);
        $row = $this->showData('id', $chid);
        return $row;
    }

    public final function updateProcat($data, $id)
    {
        $this->setTbl(self::tbl);
        $this->updateData($data, $id);
    }

    public final function deleteProcat($id)
    {
        $this->setTbl(self::tbl);
        $this->deleteData($id);
    }

    public final function showEdit($id)
    { 
        $this->setTbl(self::tbl);
        $row = $this->showData('id', $id);
        return $row;
    }
}

?>