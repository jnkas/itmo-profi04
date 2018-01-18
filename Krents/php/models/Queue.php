<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/13/18
 * Time: 12:14 PM
 */

namespace Models;


class Queue
{
    private $storage;
    private $size;


    /**
     * Stack constructor.
     */
    public function __construct()
    {
        $this->storage = [];
        $this->size    = 0;
    }

    /**
     * Push new element at end of array
     * @param $value
     */
    public function push($value)
    {
        $this->storage[] = $value;
        ++$this->size;
    }


    /**
     * Delete and return first element
     * @return mixed|null
     */
    public function shift()
    {
        $value = null;
        if ($this->size > 0) {
            --$this->size;
            $value = $this->storage[0];
            unset($this->storage[0]);
            $array = [];
            foreach ($this->storage as $item) {
                $array[] = $item;
            }
            $this->storage = $array;
        }
        return $value;
    }
}