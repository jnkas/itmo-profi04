<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/13/18
 * Time: 1:01 PM
 */

namespace App\Models;


class Vertex
{
    public $key;
    public $leftChild;
    public $rightChild;
    public $parentId;
    public $id;


    public function __construct($key)
    {
        $this->key        = $key;
        $this->leftChild  = null;
        $this->rightChild = null;
        $this->id         = null;
        $this->parentId   = null;
    }
}