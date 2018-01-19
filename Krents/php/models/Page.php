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
    const PATH = APP_PATH.'/public/files/pages';

    /**
     * Create new page
     */
    public function create()
    {
        $data             = $this->getAllPages();
        $id               = $this->getAvailableId();
        $data->last_index = $id;

        $data->pages->$id = [
            'title'   => $this->title,
            'content' => $this->content,
        ];
        $this->save($data);
    }

    /**
     * Edit page
     * @param $id
     * @param $title
     * @param $content
     */
    public function edit($id, $title, $content)
    {
        $data                      = $this->getAllPages();
        $data->pages->$id->title   = $title;
        $data->pages->$id->content = $content;
        $this->save($data);
    }

    /**
     * Get page data
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->getAllPages()->pages->$id;
    }


    /**
     * Save data to file
     * @param $data
     */
    public function save($data)
    {
        file_put_contents(APP_PATH.'/public/files/pages', json_encode($data));
    }

    /**
     * Delete page
     * @param $id
     */
    public function delete($id)
    {
        $data = $this->getAllPages();
        unset($data->pages->$id);
        $this->save($data);
    }

    /**
     * Get all data
     * @return mixed
     */
    public function getAllPages()
    {
        return json_decode(file_get_contents(self::PATH));
    }


    /**
     * Get id for new page
     * @return mixed
     */
    private function getAvailableId()
    {
        return ++$this->getAllPages()->last_index;
    }
}