<?php
include(dirname(dirname(__FILE__)) . '/inc/config.inc.php');
class Model{
	var $Data;
	function __construct() {
		global $MySQL;
		$this->Data = $MySQL;
	}
	public function MySQLConnect($Database = 0) {
		if (empty($Database))
			$Database = $this->Data['database_billing'];
		else
			$Database = $this->Data['database_tlbb'];
		$MySQLConnect = mysql_connect($this->Data['host'] . ':' . $this->Data['port'], $this->Data['username'], $this->Data['password'])
			or 
			die('Could not connect: ' . mysql_error());
		mysql_select_db($Database, $MySQLConnect) or die('Could not select database.');
		return $MySQLConnect;
	}
	public function QueryMySQL($Query, $ToDB = 0){
		$SetDB = $this->MySQLConnect($ToDB);
		$QueryRun = mysql_query($Query, $SetDB);
		if(is_bool($QueryRun) or is_string($QueryRun))
			return $QueryRun;
		while ($row = mysql_fetch_assoc($QueryRun)){
			$all[] = $row;
		}
		return $all;
	}
}