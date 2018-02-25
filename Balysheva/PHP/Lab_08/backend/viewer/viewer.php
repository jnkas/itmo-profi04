<?php
class Viewer
{
    public $content;
    public function render($data, $templatePage) {
        ob_start();
        try {
            include "asset/tmpl/".$templatePage;
        } catch (Exception $e) {
            // место где ошибка записывается в логер
            echo "Не удается вывести страницу!";
        }
        $content = ob_get_contents();
        ob_end_clean();
        $this->content = $content;
        return $this->content;
    }
    public function getJson() {
        return json_encode(['content' => $this->content]);
    }
    public function getHTML() {
        return  $this->content;
    }
}