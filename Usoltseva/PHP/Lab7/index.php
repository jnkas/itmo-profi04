<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    
        body {
            text-align: center;
        }
    
    </style>
</head>
<body>
    
 <?PHP

echo "Реализовать метод build и print в классе BTree <br><br>"; 
# Класс описывающий вершину бинарного дерева
class Vertex { //вершина графа
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
    
    //const vertexes = [1,4,5,6,7,8,10];
    const vertexes = [3,6,5,8,9,23,45];
   //const vertexes = [3,4,6,7,34, 56, 21, 9,12,13,5,16];
    
    function __construct() {
        $this->root = null;
    }
    
    # вспомогательный метод который возвращает созданную вершину.
    function createVertex($key){
        return new Vertex($key); 
    }
    
    # создаем вершину и передаем в buildBTree
    function init() { //берет vertex для порождения объектов vertex
        foreach(self::vertexes as $value) {
            $v = $this->createVertex($value); 
            $this->build($v); 
        }
    }
       
    function build (Vertex $child , $parent = null ) {
        
        /*echo "<pre>";
        print_r($child);
        echo "</pre>";*/
        # Реализуем логику поиска родителя исходя из правил формирования бинарного дерева
        
        if($this->root === null) {
            $this->root = $child;
            return;
        }
        //если парент нул, то парентом становится рут
        if($parent === null) {
            $parent = $this->root;
        }
        
        if($child->key > $parent->key) {
            if(!$parent->rightChild) {
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
    function funcForPrint($branch) {
        if (!$branch) {
            return;
        } else {
            echo '<br>';
            (!$branch->leftChild->key) ? print "null <-  {$branch->key}  " : print "{$branch->leftChild->key} <- {$branch->key}  ";
            (!$branch->rightChild->key) ? print "-> null" : print "-> {$branch->rightChild->key}";
            echo '<br>';
            $this->funcForPrint($branch->leftChild);
            $this->funcForPrint($branch->rightChild);
        }
    }
}
    
error_reporting( E_ERROR );
$tree = new BTree();
$tree->init();
$tree->printTree(); // вами реализованный метод показа сформированного дерева.
?>
</body>
</html>