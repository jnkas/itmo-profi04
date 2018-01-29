<?php

class Viewer
{
    public $content;

    private function buildingPage($data) {
        $resultPage = "";
        if ($data !== null) {
            foreach ($data as $value) {
                $tempSoloNews = sprintf(file_get_contents("asset/tmpl/newsBlock.tmpl"), $value->header, $value->newsContent, $value->id);
                $resultPage = $resultPage . $tempSoloNews;
            }
            $tempMainPage = sprintf(file_get_contents("asset/tmpl/mainPage.tmpl"), $resultPage);
        } else {
            $tempMainPage = sprintf(file_get_contents("asset/tmpl/mainPage.tmpl"), "No elements.");
        }
        return $tempMainPage;
    }

    public function render($data) {
        ob_start();
        try {
            echo $this->buildingPage($data);
        } catch (Exception $e) {
            // место где ошибка записывается в логер
            echo "Не удается вывести страницу!";
        }
        $content = ob_get_contents();
        ob_end_clean();
        $this->content = $content;
        //echo $this->content;
        return $this->content;
    }

    public function getJson() {
        return json_encode(['content' => $this->content]);
    }

    public function getHTML() {
        return  $this->content;
    }
}