<div class="container">
    <img src="public/img/admin/ali.jpg" width="150" height="150" alt="" class="academyitLogo"/>
    <form class="form-signin" action="login.php?a=login" method="post">
        <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
        <div class="login-wrap">
            <input type="email" class="form-control" placeholder="نام کاربری" name="frm[email]" autofocus>
            <input type="password" class="form-control" name="frm[password]" placeholder="کلمه عبور">
            <label class="checkbox">
                <input type="checkbox" name="frm[remember]" value="remember-me"> مرا به خاطر بسپار
                <span class="pull-right"> <a href="#"> کلمه عبور را فراموش کرده اید؟</a></span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit" name="btn">ورود</button>
            <?php
            if (isset($_GET['login'])) {
//                if ($_GET['login'] == 'error1') {
//                    echo "<i class='btn btn-block btn-danger'> لطفا نام کاربری خود را با دقت بیشتری وارد کنید</i>";
//                } elseif ($_GET['login'] == 'error2') {
//                    echo "<i class='btn btn-block btn-danger'> لطفا رمز کاربری خود را با دقت بیشتری وارد کنید</i>";
//                }
                $error = $_GET['login'];
                switch ($error) {
                    case 'error1':
                        echo "<i class='btn btn-block btn-danger'> لطفا نام کاربری خود را با دقت بیشتری وارد کنید</i>";
                        break;
                    case 'error2':
                        echo "<i class='btn btn-block btn-danger'> لطفا رمز کاربری خود را با دقت بیشتری وارد کنید</i>";
                        break;
                    case 'error3':
                        echo "<i class='btn btn-block btn-danger'> لطفا فرم را خالی نفرستید</i>";
                        break;
                }
            }
            ?>
        </div>
    </form>
</div>