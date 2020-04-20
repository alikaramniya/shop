<?php

class User extends Uploader
{
    const tbl = 'user_tbl';

    public final function login($email)
    {
        $this->setTbl(self::tbl);
        $row = $this->showData('email', $email);
        return $row;
    }
}

?>