<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            ویرایش محصول <?php echo $edit->title; ?>
        </header>
        <div class="panel-body">
            <?php
                if (!empty($listSubCat)):
            ?>
            <form role="form" action="index.php?c=product&a=edit&id=<?php echo $edit->id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان</label>
                    <input type="text" class="form-control" name="frm[title]" value="<?php echo $edit->title; ?>" id="exampleInputEmail1" placeholder="عنوان خود را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">سرگروه</label>
                    <select class="form-control m-bot15" name="frm[cat_id]">
                        <?php
                        if (!empty($listSubCat)):
                            foreach ($listSubCat as $value):
                        ?>
                            <option value="<?php echo $value->id; ?>"
								<?php 
									if ($value->id == $edit->cat_id)
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
                    <label for="exampleInputEmail1">تصویر اول</label>
                    <input type="file" name="img1">
					<img src="<?php echo $edit->img1; ?>" width="80"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تصویر دوم</label>
                    <input type="file" name="img2">
					<img src="<?php echo $edit->img2; ?>" width="80"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">تصویر سوم</label>
                    <input type="file" name="img3">
					<img src="<?php echo $edit->img3; ?>" width="80"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">قیمت</label>
                    <input type="text" name="frm[price]" placeholder="قیمت خود را به تومان وارد کنید" value="<?php echo $edit->price; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">تعداد</label>
                    <input type="text" name="frm[count]" placeholder="تعداد محصولات خود را مشخص کنید" value="<?php echo $edit->count; ?>" class="form-control">
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
                            <input type="radio" name="frm[size]" id="optionsRadios1" <?php if ($edit->size == 1) echo "checked"; ?> value="1"> 
                            متوسط
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="frm[size]" id="optionsRadios1" <?php if ($edit->size == 2) echo "checked"; ?> value="2"> 
                            بزرگ
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">توضیحات کوتاه</label>
                    <textarea name="frm[article]" class="ckeditor form-control" rows="5"><?php echo $edit->article; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">توضیحات بلند</label>
                    <textarea name="frm[text]" class="ckeditor form-control" rows="8"><?php echo $edit->text; ?></textarea>
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