<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/16/18
 * Time: 9:26 PM
 */

namespace Models;


class Page
{
    public $id = null;
    public $title;
    public $content;


    public function create($title, $content)
    {
        $this->content = $content;
        $this->title   = $title;
    }

    public function edit($id, $title, $content)
    {
        $this->content = $content;
        $this->title   = $title;
    }

    public function get($id)
    {
    }

    public function getAll()
    {
    }

    public function save()
    {
        if ($this->id === null) {
            $this->id = $this->getAvailableId();
        }
    }

    public function delete($id)
    {

    }


    private function getAvailableId()
    {
        return 1;
    }
}