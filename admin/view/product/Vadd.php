<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            افزودن محصول جدید
        </header>
        <div class="panel-body">
            <?php
                if (!empty($listSubCat)):
            ?>
            <form role="form" action="index.php?c=product&a=add" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان</label>
                    <input type="text" class="form-control" name="frm[title]" id="exampleInputEmail1" placeholder="عنوان خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">سرگروه</label>
                    <select class="form-control m-bot15" name="frm[cat_id]">
                        <?php
                        if (!empty($listSubCat)):
                            foreach ($listSubCat as $value):
                        ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تصویر اول</label>
                    <input type="file" name="img1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تصویر دوم</label>
                    <input type="file" name="img2">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تصویر سوم</label>
                    <input type="file" name="img3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">قیمت</label>
                    <input type="text" name="frm[price]" placeholder="قیمت خود را به تومان وارد کنید" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">تعداد</label>
                    <input type="text" name="frm[count]" placeholder="تعداد محصولات خود را مشخص کنید" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">وضعیت</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="frm[size]" id="optionsRadios1" value="0" checked="">
                            کوچک
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="frm[size]" id="optionsRadios1" value="1"> 
                            متوسط
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="frm[size]" id="optionsRadios1" value="2"> 
                            بزرگ
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">توضیحات کوتاه</label>
                    <textarea name="frm[article]" class="ckeditor form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">توضیحات بلند</label>
                    <textarea name="frm[text]" class="ckeditor form-control" rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-info">افزودن</button>
            </form>
            <?php
                else:
            ?>
                <a href="index.php?c=procat&a=list" class="btn btn-danger btn-block btn-lg">زیر دسته بندی فعالی برای شما یافت نشد جهت فعال سازی کلیک کیند</a>
            <?php
                endif;
            ?>
        </div>
    </section>
</div>