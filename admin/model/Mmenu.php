<?php


class Menu extends Uploader
{
    const tbl = 'menu_tbl';
    public final function addMenu($data)
    {
        $this->setTbl(self::tbl);
        $this->insertData($data);
    }

    public final function list_chid($arr)
    {
        $this->setTbl(self::tbl);
        $sql = $this->chooseData(['status', 'chid'], true);
        $sql->bindParam(":val1", $arr['0']);
        $sql->bindParam(":val2", $arr['1'], PDO::PARAM_INT);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public final function showMainChid($chid)
    {
        $this->setTbl(self::tbl);
        $row = $this->showData('id', $chid);
        return $row;
    }

    public final function delete_menu($id)
    {
        $this->setTbl(self::tbl);
        $this->deleteData($id);
    }

    public final function update_menu($data, $id)
    {
        $this->setTbl(self::tbl);
        $this->updateData($data, $id);
    }

    public final function list_menu()
    {
        $this->setTbl(self::tbl);
        $row = $this->selectData('*');
        return $row;
    }
}