<?php


class Customer extends Uploader
{
    const tbl = 'customer_tbl';
    public final function add_customer($data)
    {
        $this->setTbl(self::tbl);
        $this->insertData($data);
    }

 	public final function showEdit($vc)
 	{
 		$this->setTbl(self::tbl);
 		$row = $this->showData('vc', $vc);
 		return $row;
 	}

 	public final function updateCustomer($data, $id)
    {
        $this->setTbl(self::tbl);
        $this->updateData($data, $id);
    }

    public final function login($email)
    {
        $this->setTbl(self::tbl);
        $row = $this->showData('email', $email);
        return $row;
    }
}