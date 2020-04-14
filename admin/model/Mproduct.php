<?php

class Product extends Uploader
{
    const tbl = "product_tbl";
    public final function addPro($data) {
        $this->setTbl(self::tbl);
        $this->insertData($data);
    }

    public final function listSubCat($arr)
    {
        $this->setTbl('procat_tbl');
        $str = "select * from procat_tbl where status=:val1 and chid!=:val2 order by sort asc";
        $sql = $this->extraSql($str);
        $sql->bindParam(":val1", $arr[0]);
        $sql->bindParam(":val2", $arr[1], PDO::PARAM_INT);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public final function listPro()
    {
        $this->setTbl(self::tbl);
        $row = $this->selectData('*');
        return $row;
    }

    public final function showSubChid($catId) {
        $this->setTbl('procat_tbl');
        $row = $this->showData('id', $catId);
        return $row;
    }

    public final function updateSubCat($data, $id)
    {
        $this->setTbl('procat_tbl');
        $this->updateData($data, $id);
    }

    public final function deletePro($id)
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