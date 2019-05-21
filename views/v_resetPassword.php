<?php if(isset($ok) && $ok == true){?>
  <div class='alert alert-success col-6 offset-3' role='alert'>
     Khôi phục mật khẩu thành công!
  </div>
<?php }else{ ?>
<div class="card col-6 offset-3" >
  <div class="card-header">
    <b>Khôi phục mật khẩu</b>
  </div>
  <div class="card-body">
   <form method="POST">
    <div class="form-group">
      <label for="password">Nhập mật khẩu mới</label>
      <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Nhập mật khẩu mới">
      <?php if(isset($newPasswordErr) && ($newPasswordErr != null )): ?>
              <span class='text-danger'><?=$newPasswordErr?></span>
            <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="comfirmPassword">Nhập lại mật khẩu mới</label>
      <input type="password" class="form-control" name="comfirmPassword" id="comfirmPassword"  placeholder="Nhập lại mật khẩu mới">
      <?php if(isset($comfirmPasswordErr) && ($comfirmPasswordErr != null )): ?>
              <span class='text-danger'><?=$comfirmPasswordErr?></span>
            <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Thay đổi</button>
  </form>
</div>
</div>
<?php } ?>