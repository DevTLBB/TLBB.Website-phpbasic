<?php $Title = 'Đăng ký tài khoản';
include('header.php'); ?>
<div class="form-group">
<?php if ($Controller->Message)
	echo $Controller->Message;
else
	echo 'Mời bạn nhập thông tin tài khoản.';
?>
</div>
<form action="" method="POST">
	<input type="hidden" name="action" value="register" />
	<div class="form-group">
		<label for="username">Tài khoản:</label>
		<input class="textbox" type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />
	</div>
	<div class="form-group">
		<label for="password">Mật khẩu:</label>
		<input class="textbox" type="password" name="password" id="password" />
	</div>
	<div class="form-group">
		<label for="password2">Nhập lại mật khẩu:</label>
		<input class="textbox" type="password" name="password2" id="password2" />
	</div>
	<button type="submit">Đăng ký tài khoản</button>
</form>
<?php include('footer.php'); ?>