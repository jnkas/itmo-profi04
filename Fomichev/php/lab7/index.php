<?php
/**
 * Created by PhpStorm.
 * User: olegfomicev
 * Date: 21.02.2018
 * Time: 14:58
 */
# Задание 1
echo "Реализовать метод build и print в классе BTree" . '<br>';

# Класс описывающий вершину бинарного дерева
class Vertex {
    public $key;
    public $leftChild;
    public $rightChild;

    public function __construct($key) {
        $this->key = $key;
        $this->leftChild = null;
        $this->rightChild = null;
    }
}

# Класс в котором создаются вершины и происходит формирование дерева
class BTree {
    public $root;
//    const VERTEX = [1,4,5,6,7,8,10];
    const VERTEX = [6,2,3,4,1,7];

    function __construct(){
        $this->root = null;
    }

    # вспомогательный метод который возвращает созданную вершину.
    function createVertex($key){
        return new Vertex($key);
    }

    # создаем вершину и передаем в buildBTree
    function init() {
        foreach(self::VERTEX as $value) {
            $v = $this->createVertex($value);
            $this->build($v);
        }
    }

    function build (Vertex $child, $parent = null) {
//        echo "<pre>";
//        print_r($child);
//        echo "</pre>";

        # Реализуем логику поиска родителя исходя из правил формирования бинарного дерева

        if (!$this->root) {
            $this->root = $child;
            return;
        }

        //Если парент null, то парентом становится рут
        if(!$parent) {
            $parent = $this->root;
        }

        if ($child->key > $parent->key) {

            //Правая ветка
            if (!$parent->rightChild) {
                $parent->rightChild = $child;
                return;
            }

            else {
                //Рекурсия по правой ветке
                $this->build($child, $parent->rightChild);
            }

        }

        else {
            //Левая ветка
            if(!$parent->leftChild) {
                $parent->leftChild = $child;
                return;
            }

            else {
                //Рекурсия по левой ветке
                $this->build($child, $parent->leftChild);
            }
        }
    }

    function printTree() {
//        # Выводим содержимое дерева.
        echo "<pre>";
        print_r($this->root);
        echo "</pre>";

    }

}

$tree = new BTree();
$tree->init();
$tree->printTree(); // вами реализованный метод показа сформированного дерева.

?>