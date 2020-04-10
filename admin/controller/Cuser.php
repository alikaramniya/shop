<?php

require_once "model/Muser.php";

$user = new User();
switch ($action) {
    case 'login':
        if ($_POST) {
            $data = $_POST['frm'];
            if (empty($data['email']) and empty($data['password'])) {
                header("Location:login.php?error=field");
            } else {
                $row = $user->login($data['email']);
                if (!empty($row)) {
                    if (password_verify($data['password'], $row->password)) {
                        if ($data['remember']) {
                            $email = $row->email;
                            $password = $data['password'];
                            setcookie('email', $email, time()+60*60, 'admin');
                            setcookie('password', $password, time()+60*60, 'admin');
                        }
                        $_SESSION['name'] = $row->name . ' ' . $row->lastname;
                        header("Location:index.php?login=ok");
                    } else {
                        header("Location:login.php?error=pass");
                    }
                } else {
                    header("Location:login.php?error=email");
                }
            }
        }
        break;
    case 'logout':
        if (isset($_GET['logout'])) {
            if ($_GET['logout'] == 'ok') {
                if (isset($_COOKIE['email']) and isset($_COOKIE['password'])) {
                    $email = $row->email;
                    $password = $data['password'];
                    setcookie('email', $email, time()-10, 'admin');
                    setcookie('password', $password, time()-10, 'admin');
                }
                session_destroy();
                header("Location:login.php?logout=ok");
            }
        }
        break;
    case 'cookie':
        if (isset($_COOKIE['email']) and isset($_COOKIE['password'])) {
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];
            $row = $user->login($email);
            if (password_verify($password, $row->password)) {
                $_SESSION['name'] = $row->name . ' ' . $row->lastname;
                header("Location:index.php?login=cookie");
            }
        }
        break;
}

require_once "view/user/V$action.php";

?>