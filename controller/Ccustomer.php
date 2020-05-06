<?php

require_once "admin/model/Mcustomer.php";

$customer = new Customer();
switch ($action) {
    case 'register':
        if ($_POST) {
            $data = $_POST['frm'];
            $data['vc'] = microtime();
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            mail($data[email], 'ali karamniya', "<a href='index.php?c=customer&a=vc&vc=$data[vc]'>barayeh kamel kardan farayand verify click konid</a>");
            $customer->add_customer($data);
        }
        break;
    case 'login':
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];
            $row = $customer->login($email);
            if (!empty($row)) {
                if ($row->status == 1) {
                    if (password_verify($password, $row->password)) {
                        $_SESSION['user_name'] = $row->name;
                        $_SESSION['user_id'] = $row->id;
                        header("Location: index.php?login=cookie");
                    }
                }
            }
        } else {
            if ($_POST) {
                $data = $_POST['frm'];
                $row = $customer->login($data['email']);
                if (!empty($row)) {
                    if ($row->status == 1) {
                        if (password_verify($data['password'], $row->password)) {
                            if ($data['remember'] = 'ok') {
                                $email = $row->email;
                                $password = $data['password'];
                                setcookie('email', $email, time() + 60 * 60 * 24, '/');
                                setcookie('password', $password, time() + 60 * 60 * 24, '/');
                            }
                            $_SESSION['user_id'] = $row->id;
                            $_SESSION['user_name'] = $row->name;
                            header("Location:index.php?login=ok");
                        } else {
                            header("Location: index.php?c=customer&a=login?login=error");
                        }
                    }
                }
            }
        }
        break;
    case 'logout':
        if (isset($_GET['logout'])) {
            if ($_GET['logout'] == 'ok') {
                if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                    $email = $_COOKIE['email'];
                    $password = $_COOKIE['password'];
                    setcookie('email', $email, time() - 10, '/');
                    setcookie('password', $password, time() - 10, '/');
                }
                session_destroy();
                header("Location:index.php?c=customer&a=login");
            }
        }
        break;
    case 'vc':
        if (isset($_GET['vc'])) {
            $vc = $_GET['vc'];
            $row = $customer->showEdit($vc);
            if (!empty($row)) {
                $data['status'] = '1';
                $data['vc'] = '';
                $customer->updateCustomer($data, $row->id);
                header("Location: index.php?c=customer&a=login");
            }
        }
        break;
}

require_once "view/$controller/V$action.php";

?>