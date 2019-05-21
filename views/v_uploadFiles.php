<hr>

<div class="row" style="margin-bottom: 276px;">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header" style="background-color: #eb593c;">
                <h4>Upload ( Images: PNG / JPG / JPEG / GIF )</h4>
            </div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$error?>
                    </div>
                <?php endif?>
                <?php if (isset($result)): ?>
                    <div class="alert alert-success" role="alert">
                        <?=$result?>
                    </div>
                <?php endif?>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php if (isset($data)): ?>
                        <b style="font-size: 20px;">Chủ đề:</b>
                        <select name="category">
                        <option value="">--- Select ---</option>
                        <?php foreach ($data as $row): ?>
                               <option value=<?=$row['id'];?>>
                                   <?=$row['name'];?>
                               </option>
                        <?php endforeach;?>
                        </select>
                    <?php endif;?>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Chọn tệp mà bạn muốn lưu trữ </label>
                        <input type="file" name="fileUpload" value="" class="form-control-file">
                        <hr>
                        <input type="submit" name="up" value="Upload" class="btn btn-primary"  style="margin-left: 495px;background-color: #eb593c;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>