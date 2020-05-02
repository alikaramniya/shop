<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            افزودن منو جدید
        </header>
        <div class="panel-body">
            <form role="form" action="index.php?c=menu&a=edit&id=<?php echo $edit->id; ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان</label>
                    <input type="text" class="form-control" name="frm[title]" id="exampleInputEmail1" value="<?php echo $edit->title; ?>"
                           placeholder="عنوان خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">آدرس</label>
                    <input type="text" class="form-control" name="frm[url]" id="exampleInputEmail1" value="<?php echo $edit->url; ?>"
                           placeholder="آدرس خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">سرگروه</label>
                    <select class="form-control m-bot15" name="frm[chid]">
                        <option value="0">سرگروه</option>
                        <?php
                        if (!empty($list_chid)):
                            foreach ($list_chid as $value) :
                                ?>
                                <option value="<?php echo $value->id;  ?>"
                                    <?php if ($edit->chid == $value->id) echo 'selected'; ?>
                                ><?php echo $value->title; ?></option>
                            <?php
                            endforeach;
                        endif;
                        ?>


                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">وضعیت</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="frm[status]" id="optionsRadios1" value="1" checked="">
                            فعال
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="frm[status]" id="optionsRadios1" <?php if ($edit->status == 0) echo "checked"; ?> value="0">
                            غیر فعال
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ترتیب</label>
                    <input type="text" class="form-control" name="frm[sort]" id="exampleInputEmail1" value="<?php echo $edit->sort; ?>"
                           placeholder="ترتیب را وارد کنید">
                </div>
                <button type="submit" class="btn btn-info">افزودن</button>
            </form>
        </div>
    </section>
</div>