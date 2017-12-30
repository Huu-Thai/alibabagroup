<?php

abstract class DB {

	private $host = 'localhost';
	private $username = 'root';
	private $pass = '';
	private $database = 'alibabagroup';
	public $conn;

	function __construct(){

		$this->conn = mysqli_connect($this->host, $this->username, $this->pass, $this->database);

		mysqli_query($this->conn, 'SET names "utf8"');

	}

	public function result($query){

		$result = mysqli_query($this->conn, $query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				return $result;
			}
		}
		
		return false;
	}

	public function execute($query){

		$result = mysqli_query($this->conn, $query);

		return $result;
	}

	public function findId($id){
		
		$query = "SELECT * FROM $this->table WHERE $this->primaryId = $id";

		$result = mysqli_query($this->conn, $query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				mysqli_data_seek($result, 0);
				return mysqli_fetch_assoc($result);
			}
		}
		
		return false;
	}

	public function deleteRecord($id){
		$query = "DELETE FROM $this->table WHERE $this->primaryId = $id";

		if($this->execute($query))
			return $id;
		else
			return false;
	}

	public function getAll(){

		$query = "SELECT * FROM $this->table";

		$result = mysqli_query($this->conn, $query);
		if($result){
			if(mysqli_num_rows($result) > 0){
				mysqli_data_seek($result, 0);
				return $result;
			}
		}
		
		return false;
	}

	public function getLastId(){

		$query = "SELECT id FROM $this->table ORDER BY $this->primaryId DESC LIMIT 0, 1";

		$result = $this->result($query);
		mysqli_data_seek($result, 0);
		return mysqli_fetch_assoc($result)['id'];
	}

	function deleteFormat($string){

		$string = mysqli_real_escape_string($this->conn, strip_tags($string));
		return $string;

	}

	function stripUnicode($str)	{
		$str = str_replace(array(',', '<', '>', '&', '{', '}', '*', '?', '/', '"'), array(' '), $str);
		$str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
		if(!$str) return false;
		$unicode = array
		(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'd'=>'đ',
			'D'=>'Đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
			);

		foreach($unicode as $khongdau=>$codau)		{
			$arr = explode("|",$codau);
			$str = str_replace($arr,$khongdau,$str);
			$str = trim(strip_tags($str));
			if (get_magic_quotes_gpc()== false) {
				$str = mysql_real_escape_string($str);
			}
			$str = preg_replace('/\s+/',' ',$str);
			$str = str_replace(" ","-",$str);
		}
		$str = utf8_decode($str);
		$str = str_replace("?","",$str);
		return $str;
	}

	function cutString($string, $size, $type = '...'){

		$string = trim($string);
		$strlen = strlen($string);

		$str = substr($string, $size, 20);
		$arr = explode(' ', $str);
		$a = strlen($arr[0]);

		if($a == 0 || $arr[0] == ' ')
			$sub = substr($string, 0, $size);
		else
			$sub = substr($string, 0, $size + $a);
		if(($strlen - $size) > 0)
			$sub .= $type;
		
		return $sub;
	}

	function getClientIP() {	
		if (isset($_SERVER)) {

			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
				return $_SERVER["HTTP_X_FORWARDED_FOR"];

			if (isset($_SERVER["HTTP_CLIENT_IP"]))
				return $_SERVER["HTTP_CLIENT_IP"];

			return $_SERVER["REMOTE_ADDR"];
		}

		if (getenv('HTTP_X_FORWARDED_FOR'))
			return getenv('HTTP_X_FORWARDED_FOR');

		if (getenv('HTTP_CLIENT_IP'))
			return getenv('HTTP_CLIENT_IP');

		return getenv('REMOTE_ADDR');
	}

	function handleGetKeywords($p, $TieuDeKD){
		$cntDefault = 'alibaba group, lập trình, thiết kế, quảng cáo';
		$urlDefault = 'https://scontent.fsgn4-1.fna.fbcdn.net/v/t1.0-9/23755543_128795434456520_2586640422862253038_n.jpg?oh=af56397602e141f3d821c013b6790911&oe=5AA203DC';

		switch($p){
			case 'trangloai':

			return $this->getKeywords('loai', $TieuDeKD, $cntDefault, $urlDefault);
			break;

			case 'san-pham':
			return $this->getKeywords('tintuc', $TieuDeKD, $cntDefault, $urlDefault);
			break;

			case 'tin-tuc':
			return $this->getKeywords('tintuc', $TieuDeKD, $cntDefault, $urlDefault);
			break;

			default:
			$content['TieuDe'] = $cntDefault;
			$content['description'] = $cntDefault;
			$content['keyword'] = $cntDefault;
			$content['urlHinh'] = $urlDefault;
			return $content;
			break;
		}
	}

	function getKeywords($table, $TieuDeKD, $cntDefault, $urlDefault){
		
		$sql = "SELECT TieuDeKD FROM $table";
		$result = $this->resource($sql);

		if($result != false){
			$array = [];
			while($row = mysql_fetch_assoc($result)){
				$array[] = trim($row['TieuDeKD']);
			}
			if(in_array($TieuDeKD, $array)){

				$sql = "SELECT TieuDe, Des, Keyword, UrlHinh FROM $table WHERE TieuDeKD = '$TieuDeKD' LIMIT 0, 1";
				$resource = $this->resource($sql);
				$row = mysql_fetch_assoc($resource);

				$content['TieuDe'] = ($row['TieuDe'] != '' ? $row['TieuDe'] : $cntDefault);
				$content['description'] = ($row['Des'] != '' ? $row['Des'] : $cntDefault);
				$content['keyword'] = ($row['Keyword'] != '' ? $row['Keyword'] : $cntDefault);
				$content['urlHinh'] = ($row['UrlHinh'] != '' ? $row['UrlHinh'] : $urlDefault);

			}else{

				$content['TieuDe'] = $cntDefault;
				$content['description'] = $cntDefault;
				$content['keyword'] = $cntDefault;
				$content['urlHinh'] = $urlDefault;
			}
			return $content;
		}else{

			$content['TieuDe'] = $cntDefault;
			$content['description'] = $cntDefault;
			$content['keyword'] = $cntDefault;
			$content['urlHinh'] = $urlDefault;
			return $content;
		}
	}

	public function changeShowHide($id){

		$result = $this->checkShowHide($id);
		if($result != false){
			mysqli_data_seek($result, 0);
			$showHide = mysqli_fetch_assoc($result)['show_hide'];
			if($showHide == 0)
				$showHide = 1;
			else
				$showHide = 0;

			$query = "UPDATE $this->table SET show_hide = $showHide WHERE $this->primaryId = $id";

			if($this->execute($query))
				return $showHide;
			else
				return false;
		}else{

			return false;
		}
	}

	public function checkShowHide($id){

		$query = "SELECT show_hide FROM $this->table WHERE id = $id";

		return $this->result($query);
	}

	public function changeOrdinal($ordinal, $id){

		$query = "UPDATE $this->table SET ordinal = $ordinal WHERE $this->primaryId = $id";

		return $this->execute($query);
	}

	public function getCategoryByAlias($alias){

		$query = "SELECT id, name, alias FROM $this->table WHERE alias = '$alias'";

		return $this->result($query);
	}
}