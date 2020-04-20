<section class="panel">
    <header class="panel-heading">
        لیست محصولات

    </header>
    <table class="table table-striped table-advance table-hover">
        <thead>
        <tr>
            <th>عنوان</th>
            <th>سرگروه</th>
            <th>تصویر اول</th>
            <th>تصویر دوم</th>
            <th>تصویر سوم</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>اندازه</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($listPro)):
            foreach ($listPro as $value):
                ?>
                <tr>
                    <td><?php echo $value->title; ?></td>
                    <td>
                        <?php
                        $catId = $value->cat_id;
                        switch (true) {
                            case $parent = $pro->showSubChid($catId);
                                $title = $parent->title;
                                if ($parent->status == 0)
                                    $title = "<a href='index.php?c=product&a=list&state=no&id=$parent->id'><i class='btn btn-danger'>غیرفعال</i></a>";
                                echo $title;
                                break;
                            default:
                                echo "سرگروه حذف شده است";
                                break;
                        }
                        ?>
                    </td>
                    <td><img src="<?php echo $value->img1; ?>" width="50" height="50"/></td>
                    <td><img src="<?php echo $value->img2; ?>" width="50" height="50"/></td>
                    <td><img src="<?php echo $value->img3; ?>" width="50" height="50"/></td>
                    <td><?php echo $value->price; ?></td>
                    <td><?php echo $value->count; ?></td>
                    <td>
                        <?php
                        $size = $value->size;
                        switch ($size) {
                            case 0:
                                echo "کوچک";
                                break;
                            case 1:
                                echo "متوسط";
                                break;
                            case 2:
                                echo "بزرگ";
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <a href="index.php?c=product&a=edit&id=<?php echo $value->id; ?>">
                            <button class="btn btn-primary btn-xs"><i class="icon-edit"></i></button>
                        </a>
                    </td>
                    <td>
                        <a href="index.php?c=product&a=delete&id=<?php echo $value->id; ?>">
                            <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
                        </a>
                    </td>
                </tr>
            <?php
            endforeach;
        else:
        ?>
        </tbody>
    </table>
    <a href="index.php?c=product&a=add"><span class="btn btn-block btn-danger">لیست محصولات خالی است جهت افزودن محصول جدید کلیک کنید</span></a>
    <?php
    endif;
    ?>
</section>