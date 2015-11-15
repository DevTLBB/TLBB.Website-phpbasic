<?php $CheckIndex = preg_match('/index.php/', $_SERVER['REQUEST_URI']);
if (empty($CheckIndex))
	header('Location:/index.php');
include(dirname(__FILE__) . '/Model.php');
$Model = new Model;
class Controller{
	var $Model;
	var $ActionGET;
	var $ActionPOST;
	var $Message;
	var $IsUserLoggedIn;
	function __construct(){
		global $Model;
		$this->Model = $Model;
		$this->IsUserLoggedIn = $this->IsUserLoggedIn();
		if (isset($_GET['action']) and $_GET['action'])
			$this->ActionGET = $_GET['action'];
		if (isset($_POST['action']) and $_POST['action'])
			$this->ActionPOST = $_POST['action'];
		$this->ActionGET = basename($this->ActionGET);
		switch($this->ActionPOST){
			case 'register':
				$this->Register($_POST);
				break;
			case 'login':
				$this->Login($_POST);
				break;
		}
	}
	public function BuildViewFile(){
		$FolderView = dirname(__FILE__) . '/View/';
		$FileName = $this->ActionFileName($this->ActionGET);
		$FileExists = file_exists($FolderView . $FileName);
		if (empty($FileExists) or empty($this->ActionGET))
			$this->ActionGET = 'index';
		return $FolderView . $this->ActionFileName($this->ActionGET);
	}
	private function ActionFileName($Action){
		$FileName = 'page-' . $Action . '.php';
		return $FileName;
	}
	public function GetPlayerClassName ($ClassID = null) {
		switch($ClassID){
			case 0:
				$Name = 'Thiếu Lâm';
				break;
			case 1:
				$Name = 'Minh Giáo';
				break;
			case 2:
				$Name = 'Cái Bang';
				break;
			case 3:
				$Name = 'Võ Đang';
				break;
			case 4:
				$Name = 'Nga My';
				break;
			case 5:
				$Name = 'Tinh Túc';
				break;
			case 6:
				$Name = 'Thiên Long';
				break;
			case 7:
				$Name = 'Thiên Sơn';
				break;
			case 8:
				$Name = 'Tiêu Dao';
				break;
			/* case 9:
				$Name = 'Mộ Dung';
				break;
			case 10:
				$Name = '';
				break;
			case 11:
				$Name = '';
				break; */
			default:
				$Name = 'Không có';
				break;
		}
		return $Name;
	}
	public function CharsetPlayerName($Name){
		$Encode = utf8_encode($Name);
		return $Encode;
	}
	public function Register($Data){
		$UserName = $Data['username'];
		$Password = $Data['password'];
		if(empty($UserName)) {
			$this->Message = 'Chưa nhập tên tài khoản.';
			return false;
		}
		if(empty($Password)) {
			$this->Message = 'Chưa nhập mật khẩu.';
			return false;
		}
		if(empty($Data['password2'])) {
			$this->Message = 'Chưa nhập lại mật khẩu.';
			return false;
		}
		if($Data['password2'] != $Password) {
			$this->Message = 'Rất tiếc, mật khẩu nhập lại không khớp.';
			return false;
		}
		$Query = 'SELECT id FROM account WHERE name="' . $UserName .'";';
		$CheckExits = $this->Model->QueryMySQL($Query);
		if(!empty($CheckExits)) {
			$this->Message = 'Rất tiếc, tài khoản này đã tồn tại.';
			return false;
		}
		$Query = "INSERT INTO account
			(name, password, point)
			VALUES
			('" . $UserName . "', '" . md5($Password) . "', '0');";
		$AddUser = $this->Model->QueryMySQL($Query);
		if ($AddUser)
			$this->Message = 'Chúc mừng <strong>' . $UserName . '</strong> đã đăng ký tài khoản thành công.';
		else
			$this->Message = 'Rất tiếc, đăng ký tài khoản thất bại.';
	}
	public function IsUserLoggedIn(){
		if (isset($_COOKIE['username']))
			$UserName = $_COOKIE['username'];
		else
			return false;
		if (isset($_COOKIE['password']))
			$Password = $_COOKIE['password'];
		else
			return false;
		$Query = 'SELECT password FROM account WHERE name="' . $UserName .'";';
		$CheckExits = $this->Model->QueryMySQL($Query);
		$AccountInfo = $CheckExits[0];
		if(empty($AccountInfo) or $AccountInfo['password'] != md5($Password) or isset($_GET['logout'])) {
			setcookie('username', '', time() - 3600, '/');
			setcookie('password', '', time() - 3600, '/');
			return false;
		}
		return true;
	}
	public function Login($Data){
		$UserName = $Data['username'];
		$Password = $Data['password'];
		if(empty($UserName)) {
			$this->Message = 'Chưa nhập tên tài khoản.';
			return false;
		}
		if(empty($Password)) {
			$this->Message = 'Chưa nhập mật khẩu.';
			return false;
		}
		$Query = 'SELECT name,password FROM account WHERE name="' . $UserName .'";';
		$CheckExits = $this->Model->QueryMySQL($Query);
		$AccountInfo = $CheckExits[0];
		if(empty($AccountInfo)) {
			$this->Message = 'Rất tiếc, tài khoản này không tồn tại.';
			return false;
		}
		if($AccountInfo['password'] != md5($Password)) {
			$this->Message = 'Rất tiếc, mật khẩu bạn điền vào không đúng.';
			return false;
		}
		setcookie('username', $UserName, time() + 3600, '/');
		setcookie('password', $Password, time() + 3600, '/');
		$_COOKIE['username'] = $UserName;
		$_COOKIE['password'] = $Password;
		$this->IsUserLoggedIn = true;
	}
}