<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/13/18
 * Time: 12:56 PM
 */

namespace Models;


class BTree
{
    /** @var Vertex|null */
    public $root;
    public $vertex = [];
    private $showRoot = false;
    public $renderData = [];

    public function __construct($vertex)
    {
        $this->root = null;
        $this->vertex = $vertex;
    }

    # вспомогательный метод который возвращает созданную вершину.
    public function createVertex($key)
    {
        return new Vertex($key);
    }

    # создаем вершину и передаем в buildBTree
    public function init()
    {
        foreach ($this->vertex as $value) {
            $v = $this->createVertex($value);
            $this->build($v);
        }
    }

    /**
     * @param Vertex $child
     * @param Vertex|null $parent
     */
    public function build(Vertex $child, Vertex $parent = null)
    {
        # Реализуем логику поиска родителя исходя из правил формирования бинарного дерева
        if (!$this->root) {
            $child->id  = $this->generateId();
            $this->root = $child;
            return;
        }
        $parent          = $parent !== null ? $parent : $this->root;
        $child->parentId = $parent->id;
        $child->id       = $this->generateId();
        if ($child->key > $parent->key) {
            //Right
            if (!$parent->rightChild) {
                $parent->rightChild = $child;
                return;
            }
            $this->build($child, $parent->rightChild);
        }
        if ($child->key < $parent->key) {
            //Left
            if (!$parent->leftChild) {
                $parent->leftChild = $child;
                return;
            }
            $this->build($child, $parent->leftChild);
        }
    }


    private function generateId()
    {
        return 'node_'.uniqid();
    }

    /**
     * @param Vertex|null $node
     * @param Vertex|null $parentNode
     */
    public function print(Vertex $node = null, Vertex $parentNode = null)
    {
        if (!$this->showRoot && $node === null) {
            $this->showRoot = true;
            $node           = $this->root;
        }
        if ($node !== null) {
            $data = [
                'text' => $node->key
            ];
            if ($node->parentId !== null) {
                $data['parent'] = $node->parentId;
            }
            $this->renderData[$node->id] = $data;
            $this->print($node->leftChild, $node);
            $this->print($node->rightChild, $node);
        } else {
            $data                                  = [
                'text' => ''
            ];
            $data['parent']                        = $parentNode->id;
            $this->renderData[$this->generateId()] = $data;
        }
        return;

    }

}