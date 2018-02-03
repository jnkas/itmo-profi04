<?php

class Model {
	
	public $content;
	public $page_txt;
	public $str_number;
	
	public function __construct() {
		$this->content = $_POST['name'].';'.$_POST['subscribe']."\r"."\n";
		$this->page_txt = '././tpl/page.txt';
		$this->str_number = $_POST['str_number'];
	}
	
	public function change_func() {
		if($_POST['create']) {
			$this->create();
		} elseif($_POST['edit']) {
			$this->edit();
		} elseif($_POST['delete']) {
			$this->delete();
		} elseif($_POST['delete_all']) {
			$this->delete_all();
		}
	}
	
	public function create() {
		file_put_contents($this->page_txt, $this->content, FILE_APPEND);
	}
	
	public function edit() {
		$arr_page = file($this->page_txt);
		$arr_page[$this->str_number-1] = $this->content;
		$fo = fopen($this->page_txt, 'w+');
			foreach($arr_page as $string) {
				fwrite($fo, $string);
			}
		fclose($fo);
	}
	
	public function delete() {
		$arr_page = file($this->page_txt);
		array_splice($arr_page, $this->str_number-1, $this->str_number);
		$fo = fopen($this->page_txt, 'w+');
			foreach($arr_page as $string) {
				fwrite($fo, $string);
			}
		fclose($fo);
	}
	
	public function delete_all() {
		$arr_page = array();
		$fo = fopen($this->page_txt, 'w');
			foreach($arr_page as $string) {
				fwrite($fo, $string);
			}
	}
}