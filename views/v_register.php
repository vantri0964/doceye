
	<div class="container" style="margin-top: 20px;">
		<div class="col-md-6 offset-3" >
			<div class="card">
			<div class="card-header" style="background-color: #eb593c;">
				<h2>Đăng ký</h2>
			</div>
			<div class="card-body">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<div class="form-group">	
						<label>Tên đăng nhập: (*)</label>
						<input type="text" class="form-control" name="username" id="username" required minlength=6 maxlength="50" placeholder="Nhập tên đăng nhập">
						<?php if(isset($errUsername) && ($errUsername != null )): ?>
							<span class='text-danger'><?=$errUsername?></span>
						<?php endif; ?>
					</div>
					<div class="form-group"> 	
						<label>Họ và tên: (*)</label>
						<input type="text" class="form-control" name="name" id="name" required minlength=10 maxlength="50" placeholder="Nhập họ và tên">
						<?php if(isset($errName) && ($errName != null )): ?>
							<span class='text-danger'><?=$errName?></span>
						<?php endif; ?>
					</div>
					<div class="form-group"> 	
						<label>Email: (*)</label>
						<input type="email" class="form-control" name="email" id="email" required maxlength="100" placeholder="Nhập email"> 
						<?php if(isset($errEmail) && ($errEmail != null )): ?>
							<span class='text-danger'><?=$errEmail?></span>
						<?php endif; ?>
					</div>
					<div class="form-group"> 
						<label >Mật khẩu: (*)</label>
						<input type="password" class="form-control" name="password" id="password" required minlength=6 maxlength="100" placeholder="Nhập mật khẩu">
						<?php if(isset($errPassword) && ($errPassword != null )): ?>
							<span class='text-danger'>
								<?=$errPassword?>
							</span>
						<?php endif; ?>
					</div>
					<div class="form-group"> 
						<label >Nhập lại mật khẩu: (*)</label>
						<input type="password" class="form-control" name="confirmPass" id="confirmPass" required minlength=6 maxlength="100" placeholder="Nhập lại mật khẩu">
						<?php if(isset($errConfirmPass) && ($errConfirmPass != null )): ?>
							<span class='text-danger'><?=$errConfirmPass?></span>
						<?php endif; ?>
					</div>
					<div class="form-group">
							<label for="birthday">Ngày sinh: </label>
							<input type="date" class="form-control" name="birthday" id="birthday" min="1920-01-01" max="2019-01-04">
					</div>
					<div class="form-group">
						<label >Giới tính: </label>
						<br/>
							<label for="male">Nam</label>
								<input type="radio" class="single-bottom" name="sex" id="male" value="Nam">
							<label for="female">Nữ</label>
								<input type="radio" class="single-bottom" name="sex" id="female" value="Nữ">
					</div>
					<div class="form-group"> 	
						<label>Số điện thoại:</label>
						<input type="number" class="form-control" name="phone" id="phone" maxlength="20" placeholder="Nhập số điện thoại"> 
					</div>
					<div class="form-check">
					    <input type="checkbox" name="terms" class="form-check-input" id="exampleCheck1"  required>
					    <label class="form-check-label" for="exampleCheck1">Đồng ý với điều khoản!</label>
					 </div>

					<input type="submit" name="register" value="Đăng ký" style="margin-left: 375px;background-color: #eb593c;" class="btn btn-success">
				</form>
				</div>
			</div>
		</div>
		<!-- end register  -->
	</div>
