<?php

class Model {
	
	public $content;
	public $page_txt;
	public $create_btn;
	public $edit_btn;
	public $delete_btn;
	public $deleteAll_btn;
	public $str_number;
	
	public function __construct() {
		$this->content = $_POST['name'].';'.$_POST['subscribe']."\r"."\n";
		$this->page_txt = '././tpl/page.txt';
		$this->create_btn = $_POST['create'];
		$this->edit_btn = $_POST['edit'];
		$this->delete_btn = $_POST['delete'];
		$this->deleteAll_btn = $_POST['delete_all'];
		$this->str_number = $_POST['str_number'];
	}
	
	public function change() {
		if($this->create_btn) {
			file_put_contents($this->page_txt, $this->content, FILE_APPEND);
		} elseif($this->edit_btn) {
			$arr_page = file($this->page_txt);
			$arr_page[(int)$this->str_number-1] = $this->content;
			$fo = fopen($this->page_txt, 'w+');
			foreach($arr_page as $string) {
				fwrite($fo, $string);
			}
			fclose($fo);
		} elseif($this->delete_btn) {
			$arr_page = file($this->page_txt);
			array_splice($arr_page, $this->str_number-1, $this->str_number);
			$fo = fopen($this->page_txt, 'w+');
			foreach($arr_page as $string) {
				fwrite($fo, $string);
			}
			fclose($fo);
		} elseif($this->deleteAll_btn) {
			$arr_page = array();
			$fo = fopen($this->page_txt, 'w');
			foreach($arr_page as $string) {
				fwrite($fo, $string);
			}
		}
    }
}