<div class="container">
    <img src="public/img/admin/ali.jpg" width="150" height="150" alt="" class="academyitLogo"/>

    <form class="form-signin" action="login.php" method="post">
        <div class="login-wrap">
            <input type="email" class="form-control" placeholder="نام کاربری" name="frm[email]" autofocus>
            <input type="password" class="form-control" name="frm[password]" placeholder="کلمه عبور">
            <label class="checkbox">
                <input type="checkbox" name="frm[remember]" value="remember-me"> مرا به خاطر بسپار
                <span class="pull-right"> <a href="#"> کلمه عبور را فراموش کرده اید؟</a></span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit" name="btn">ورود</button>

            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
                switch ($error) {
                    case 'field':
                        echo "<i class='btn btn-danger btn-block'>لطفا فرم را خالی نفرستید</i>";
                        break;
                    case 'pass':
                        echo "<i class='btn btn-danger btn-block'>رمز شما صحیح نبود</i>";
                        break;
                    case 'email':
                        echo "<i class='btn btn-danger btn-block'>ایمیل شما صحیح نبود</i>";
                        break;
                }
            }
            ?>

        </div>
    </form>

</div>