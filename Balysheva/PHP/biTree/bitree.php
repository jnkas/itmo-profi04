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
# Задание 1 

//echo "Реализовать метод build и print в классе BTree"; 
//------------------------------------------------------------------
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

//------------------------------------------------------------------
# Класс в котором создаются вершины и происходит формирование дерева 
class BTree {
    public $root;
    
    #const vertexes = [1,4,5,6,7,8,10];
    #const vertexes = [10,8,5,6,7,4,1];
    #const vertexes = [7,8,10,1,4,5,6];
    const vertexes = [5,1,6,7,4,10,8];
    #const vertexes = [5,4,3,2,1,10,8,7,6];
    
    public static $str = 'Вершина ';
    
    function __construct() {
        $this->root = null;
    }
    
    # вспомогательный метод который возвращает созданную вершину.
    function createVertex($key){
        return new Vertex($key); 
    }
    
    # создаем вершину и передаем в buildBTree
    function init() {
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
    
    public function printTree(){
        echo $this->root->key . '<br>';
        $this->printTree2($this->root);
            
	}
	public function printTree2($p){

		if($p == null){
			return;
		} else {

            echo '<br>';
            
            echo "{$p->leftChild->key} // {$p->key} \\\\ {$p->rightChild->key}";

            //echo '<br>';
            $this->printTree2($p->leftChild);
			
            //echo '<br>';
            $this->printTree2($p->rightChild);
			
            echo '<br>';
			
        }
    }
}

//-------------------------------------------------------------------------
$tree = new BTree();
$tree->init();
$tree->printTree(); // вами реализованный метод показа сформированного дерева.

?>


</body>
</html>