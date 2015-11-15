<?php if(empty($Title)) $Title = null; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="fav.png" rel="shortcut icon" type="image/x-icon" />
<title><?php
if ($Title)
	echo $Title;
else
	echo 'Thiên Long Bát Bộ';
?></title>
<link href="asset/css/mainsite.css?v=1.1.1" rel="stylesheet" type="text/css" />
<link href="asset/css/njx-subpage.css?v=1.1.2" rel="stylesheet" type="text/css" media="all" />
<link href="asset/style.css?v=1.1.2" rel="stylesheet" type="text/css" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="asset/js/mainsite.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	jQuery(".FlagLeft").animate({top:0},600);
	/* jQuery("#mainNav .HasChild a, #mainNav .HasChild ul").hover(
		function(){
			Class = $(this).attr('class');
			jQuery('#mainNav > .HasChild.' + Class + ' > ul').css({
				'display':'block'
			})
		},
		function(){
			Class = $(this).attr('class');
			jQuery('#mainNav > .HasChild.' + Class + ' > ul').css({
				'display':'none'
			})
		}
	) */
});
</script>
</head>
<body class="GaMediumSubpage" style="position: relative;">
<div id="outerBg">
	<!--<div class="SuKien" id="outerBgBottom">-->
	<div id="outerBgBottom">
		<div id="outer">
			<aside class="FlagLeft" style="top: -1000px;">
				<h1><a href="index.php">Trang chủ</a></h1>
				<div class="BoxMainLink">
					<a class="Download GaCategoryTaiGame" id="flashBtnDownload1" href="?action=download">Tải Game</a>
					<a class="NapThe GaCategoryNapThe" href="javascript://">Nạp thẻ</a>
					<a class="DangKy GaCategoryDangKy" id="zme-registerwg" href="?action=register">Đăng ký</a>
				</div>
				<ul class="MenuAside">
					<li><a class="MenuAside01 GaCategoryHoTroKhachHang" href="javascript://" >Hỗ trợ khách hàng</a></li>
					<li><a class="MenuAside02 GaCategoryQuanLyTaiKhoan" href="?action=account-manager" >Quản lý tài khoản</a></li>
					<li><a class="MenuAside03 GaCategoryChuyenServer" href="javascript://" >Chuyển server</a></li>
					<li><a href="?action=topserver" class="MenuAside04 GaCategoryBangXepHang">Bảng xếp hạng</a></li>
					<li><a href="javascript://" class="MenuAside05 GaCategoryDienDan" >Diễn đàn</a></li>
				</ul>
				<ul class="FanPage">
					<li><a class="ZingMe" href="javascript://" >Zing Me</a></li>
					<li><a class="FaceBook" href="http://fb.com/dark.hades.1102" target="_blank">Facebook</a></li>
				</ul>
			</aside>
			<header>
				<nav>
					<ul id="mainNav">
						<li><a class="TrangChu" href="index.php">Trang chủ</a></li>
						<!--<li class="TinTuc HasChild">-->
						<li class="TinTuc">
							<a class="TinTuc" href="?action=tintuc">Tin tức</a>
						</li>
						<li class="SuKien"><a class="SuKien" href="javascript://">Sự kiện</a></li>
						<li class="CamNang HasChild">
							<a class="CamNang" href="javascript://">Cẩm nang</a>
							<ul style="display: none;">
								<li><a class="First" href="javascript://">Tân thủ</a></li>
								<li><a href="javascript://">Cao thủ</a></li>
								<li><a href="javascript://">Môn phái</a></li>
								<li><a href="javascript://">Trang bị</a></li>
								<li class="Off"><a href="javascript://">Thư viện</a></li>
								<li><a class="Last" href="javascript://">Cài đặt ngay</a></li>
							</ul>
						</li>
						<li class="CanBiet HasChild"><a class="CanBiet" href="javascript://">Cần biết</a>
							<ul style="display: none;">
								<li><a class="First" href="javascript://">Hướng dẫn cài đặt</a> </li>
								<li> <a href="javascript://">Nhóm máy chủ</a> </li>
								<li> <a href="javascript://">Điều khoản sử dụng</a></li>
								<li><a class="Last" href="javascript://" >Trung tâm hỗ trợ</a></li>
							</ul>
						</li>
						<li class="CongDong HasChild"><a class="CongDong" href="javascript://">Cộng đồng</a>
							<ul style="display: none;">
								<li><a class="First" href="" >Fanpage Facebook</a></li>
								<li><a href="javascript://" >Fanpage Zing Me</a></li>
								<li class="Off"><a href="javascript://">CMS Talk</a></li>
								<li><a class="Last" href="javascript://" >Diễn đàn</a></li>
							</ul>
						</li>
						<li class="PhienBan HasChild"><a class="PhienBan" href="javascript://">Phiên bản</a>
							<ul style="display: none;">								
								<li><a href="javascript://" >Kiếm Vũ Cửu Thiên</a></li>
								<li><a href="javascript://" >Long Môn Phi Kiếm</a></li>
								<li><a href="javascript://" >Đại Kiếm Hội</a></li>
								<li><a class="Last" href="javascript://" >Thiên Kim Chiến Tích</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</header>
			<div class="Content" id="content">
				<div class="MainContent">
					<div class="MainContentTop">
						<div id="static">
						<div class="StaticTopPanel SuKien">
							<ul id="breadcrumbs">
								<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
									<a href="index.php" itemprop="url"><span itemprop="title">Trang chủ</span></a>
									<?php if ($Title) { ?>&gt;<?php } ?>
								</li>
								<?php if ($Title) { ?><li itemprop="url"><span class="Active" itemprop="title"><?php echo $Title; ?></span></li><?php } ?>
							</ul>
						</div>
						<div class="StaticOuter">
							<div class="StaticInner">
								<div class="StaticMain">
