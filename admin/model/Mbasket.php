<?php


class Basket extends Uploader
{
    const tbl = 'basket_tbl';

    public final function listBasket($userId)
    {
        $this->setTbl(self::tbl);
        $sql = $this->chooseData(['user_id'], false);
        $sql->bindParam(":val", $userId, PDO::PARAM_INT);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public final function deleteBasket($id)
    {
        $this->setTbl(self::tbl);
        $this->deleteData($id);
        header("Location:index.php?c=basket&a=list");
    }

    public final function addBasket($data)
    {
        $this->setTbl(self::tbl);
        $this->insertData($data);
    }

    public final function checkBasket($arr)
    {
        $this->setTbl(self::tbl);
        $sql = $this->chooseData(['user_id', 'pro_id'], false);
        $sql->bindParam(":val1", $arr['0'], PDO::PARAM_INT);
        $sql->bindParam(":val2", $arr['1'], PDO::PARAM_INT);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        return $row;
    }
}