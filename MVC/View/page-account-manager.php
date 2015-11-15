<?php $Title = 'Quản lý tài khoản';
include('header.php'); ?>
<div class="form-group">
<?php if ($Controller->IsUserLoggedIn){
	echo '<div style="text-align:right;">';
	echo "Xin chào <strong>{$_COOKIE['username']}</strong>.";
	echo ' <a href="?action=account-manager&logout=true">Thoát</a>';
	echo '</div>';
} else if ($Controller->Message)
	echo $Controller->Message;
else
	echo 'Mời bạn điền thông tin đăng nhập'; ?>
</div>
<?php if ($Controller->IsUserLoggedIn) { ?>
	Xin chào, đây là trang quản lý tài khoản.<br />
	Các chức năng quản lí tài khoản đang được xây dựng.
<?php } else { ?>
	<form action="?action=account-manager" method="POST">
		<input type="hidden" name="action" value="login" />
		<div class="form-group">
			<label for="username">Tài khoản:</label>
			<input class="textbox" type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />
		</div>
		<div class="form-group">
			<label for="password">Mật khẩu:</label>
			<input class="textbox" type="password" name="password" id="password" />
		</div>
		<button type="submit">Đăng nhập</button>
	</form>
<?php } ?>
<?php include('footer.php'); ?>