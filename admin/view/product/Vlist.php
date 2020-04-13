<section class="panel">
    <header class="panel-heading">
        Advanced Table
    
    </header>
    <table class="table table-striped table-advance table-hover">
        <thead>
            <tr>
                <th>عنوان</th>
                <th>سرگروه</th>
                <th>وضعیت</th>
                <th>ترتیب</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
            <?php
if ($total > 0):
    foreach ($listProcat as $value):
?>
            <tr>
                <td><?php echo $value->title; ?></td>
                <td>
                    <?php
                        $chid = $value->chid;
                        switch (true) {
                            case ($chid == 0) :
                                echo "ندارد";
                                break;
                            case $parent = $procat->showMainChid($chid);
                                echo $parent->title;
                                break;
                            default:
                                echo "سرگروه حذف شده";
                                break;
                        }
                    ?>
                </td>
                <td>
                    <?php
                        $status = $value->status;
                        $state = "<a href='index.php?c=procat&a=list&state=no&id=$value->id'><i class='btn btn-danger'>غیرفعال</i></a>";
                        if ($status == 1)
                            $state = "<a href='index.php?c=procat&a=list&state=ok&id=$value->id'><i class='btn btn-success'>فعال</i></a>";
                        echo $state;
                    ?>
                </td>
                <td><?php echo $value->sort; ?></td>
                <td>
                    <a href="index.php?c=procat&a=edit&id=<?php echo $value->id; ?>">
                        <button class="btn btn-primary btn-xs"><i class="icon-edit"></i></button>
                    </a>
                </td>
                <td>
                    <a href="index.php?c=procat&a=delete&id=<?php echo $value->id; ?>">
                        <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
                    </a>
                </td>
            </tr>
            <?php
    endforeach;
endif;
?>
        </tbody>
    </table>
</section>