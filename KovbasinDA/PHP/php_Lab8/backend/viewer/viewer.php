<?php

class Viewer
{
    public function render($data) {
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
}