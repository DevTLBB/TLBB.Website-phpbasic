<?php
/*
	Coder: Dark.Hades
	Code Name: Quản lý Server Thiên Long Bát Bộ
	Code Type: PHP & MySQL
	Mô hình: M-V-C
*/
error_reporting(E_ALL); 
ini_set("display_errors", 1); 
include(dirname(__FILE__) . '/MVC/Controller.php');
$Controller = new Controller;
include($Controller->BuildViewFile());