<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            ویرایش دسته بندی <?php echo $edit->title; ?>
        </header>
        <div class="panel-body">
            <form role="form" action="index.php?c=procat&a=edit&id=<?php echo $edit->id; ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان</label>
                    <input type="text" class="form-control" value="<?php echo $edit->title; ?>" name="frm[title]" id="exampleInputEmail1" placeholder="عنوان خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">سرگروه</label>
                    <select class="form-control m-bot15" name="frm[chid]">
                        <option value="0">سرگروه</option>
                        
                        <?php
                            if ($total > 0) :
                                foreach ($listMainChid as $value) :
                        ?>
                            <option value="<?php echo $value->id; ?>"
                                <?php
                                    if ($edit->chid == $value->id)
                                        echo "selected";
                                ?>
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
                            <input type="radio" name="frm[status]" id="optionsRadios1" <?php if ($edit->status == '0') echo "checked"; ?> value="0"> 
                            غیر فعال
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ترتیب</label>
                    <input type="text" class="form-control" value="<?php echo $edit->sort; ?>" name="frm[sort]" id="exampleInputEmail1" placeholder="ترتیب را وارد کنید">
                </div>
                <button type="submit" class="btn btn-info">ویرایش</button>
            </form>
        </div>
    </section>
</div>