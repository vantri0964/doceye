
	<div class="container" style="margin-bottom: 165px;">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card" style="margin-top:20px;">
					<div class="card-header" style="background-color: #eb593c;">
						<h2>Thay đổi mật khẩu</h2>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group"> 	
								<label>Mật khẩu cũ: (*) </label>
								<input type="password" class="form-control" name="oldPassword" id='oldPassword' placeholder="Nhập mật khẩu cũ" minlength=6 maxlength="100" required/> 
								<?php 
								if(isset($oldPasswordErr)){
									?>
									<span class="text-danger"><?=$oldPasswordErr?></span>
									<?php
								}
								?>
							</div>
							<div class="form-group"> 
								<label>Mật khẩu mới: (*)</label>
								<input type="password" class="form-control" name="newPassword" placeholder="Nhập mật khẩu mới" minlength=6 maxlength="100" required/>
								<?php 
								if(isset($newPasswordErr)){
									?>
									<span class="text-danger"><?=$newPasswordErr?></span>
									<?php

								}
								?>
							</div>
							<div class="form-group"> 
								<label>Nhập lại mật khẩu mới: (*)</label>
								<input type="password" class="form-control" name="newPassword2" placeholder="Nhập lại mật khẩu mới" minlength=6 maxlength="100" required/>
								<?php 
								if(isset($newPassword2Err)){
									?>
									<span class="text-danger"><?=$newPassword2Err?></span>
									<?php

								}
								?>
							</div>		
							<input type="submit" value="Chấp nhận" style="margin-left: 375px;background-color: #eb593c;" class="btn btn-success"> 
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Thay đổi mật khẩu';
	    });
	</script>