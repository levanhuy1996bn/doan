<?php 
include_once './database/db.php';
class Navigation {
	private $conn;
	public static function link($page, $text) {
		return "<a href=\"index.php?p=$page\"><i class=\"fa fa-table fa-fw\"></i>$text</a>";
	}
	public static function linklist($page, $text) {
		return "<a href=\"index.php?p=$page\"><i class=\"fa fa-database\"></i> $text</a>";
	}
	public static function linkadd($page, $text) {
		return "<a href=\"index.php?p=$page\"><i class=\"fa fa-plus-circle\"></i>$text</a>";
	}
	public static function link1($page, $text) {
		return "<a href=\"index.php?p=$page\"></i>$text</a>";
	}
	public static function setTitle($title){
		$buffer =ob_get_contents();
		ob_end_clean();
		$buffer =str_replace("%TITLE%" ,$title ,$buffer);
		echo $buffer;
	}
}
 ?>