<?php

class Viewer
{
    public function render($data) {
        $resultPage = "";
        foreach ($data as $value) {
            $tempSoloNews = sprintf(file_get_contents("asset/tmpl/newsBlock.tmpl"), $value->header, $value->newsContent);
            $resultPage = $resultPage.$tempSoloNews;
        }
        $tempMainPage = sprintf(file_get_contents("asset/tmpl/mainPage.tmpl"), $resultPage);
        return $tempMainPage;
    }
}