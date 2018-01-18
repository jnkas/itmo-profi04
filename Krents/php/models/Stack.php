<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/13/18
 * Time: 11:49 AM
 */

namespace Models;


class Stack
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
     * Delete and return last element
     * @return mixed|null
     */
    public function pop()
    {
        $value = null;
        if ($this->size > 0) {
            --$this->size;
            $value = $this->storage[$this->size];
            unset($this->storage[$this->size]);
        }
        return $value;
    }
}