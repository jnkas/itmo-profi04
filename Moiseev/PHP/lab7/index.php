<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style="text-align: center">

<?PHP
# Задание 1 

//echo "Реализовать метод build и print в классе BTree";
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
           //const vertex = [1,4,5,6,7,8,10];
           //const vertex = [5,1,3,8,4,7,10];
            const vertex = [2,8,3,7,9,1,10];
    # вспомогательный метод который возвращает созданную вершину.
          function createVertex($key){
           return new Vertex($key); 
 }
    
    # создаем вершину и передаем в buildBTree
    function init() {
        foreach(self::vertex as $value) {
            $v = $this->createVertex($value); 
            $this->build($v); 
        }
    }
       
    function build (Vertex $child , $parent = null ) {
        # Реализуем логику поиска родителя исходя из правил формирования бинарного дерева

        if (!$this->root) {
            $this->root = $child;
            return;
        }

        if(!$parent) {
            $parent = $this->root;
        }

        if ($child->key > $parent->key) {
            if (!$parent->rightChild) {
                $parent->rightChild = $child;
                return;
            } else {
                $this->build($child, $parent->rightChild);
            }
        } else {
            if(!$parent->leftChild) {
                $parent->leftChild = $child;
                return;
            } else {
                $this->build($child, $parent->leftChild);
            }
        }
    }
    
    function printTree() {
        # Выводим содержимое дерева.
        echo $this->root->key;
        $this->funcForPrint($this->root);
    }

    function funcForPrint($obj) {
        if (!$obj) {
            return;
        } else {
            print '<br>';
            (!$obj->leftChild->key) ? print "null <<  {$obj->key}  " : print "{$obj->leftChild->key} <<  {$obj->key}  ";
            (!$obj->rightChild->key) ? print ">> null" : print ">> {$obj->rightChild->key}";
            $this->funcForPrint($obj->leftChild);
            $this->funcForPrint($obj->rightChild);
        }
    }
}

            $tree = new BTree();
            $tree->init();
            $tree->printTree(); // вами реализованный метод показа сформированного дерева.

?>

</body>
</html>