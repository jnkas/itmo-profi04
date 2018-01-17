<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
 <?PHP
# Задание 1 
//цикл for и mass [] из вершин - массив объектов 
//взяли первый объект массива принять за рут, далее берем следующий и проверяем 1)что есть рут(если нет устанавливаем рутом), далее сравниваем и делаем присвоение лефтчайлд или райтчайлд

//через рекурсию

//первый случай  NULL, obj1
//второй шаг - берем второй элемент массива, если нашли детей у родителя то передаем их рекурсивно как родителей

//родитель - дети есть - пробрасываем рекурсивно их родителями если нет присваем как дитя $obj1->leftchild=$obj2 или правый через if 

echo "Реализовать метод build и print в классе BTree <br><br>"; 

# Класс описывающий вершину бинарного дерева
class Vertex { //вершина граф
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
    
    const vertexes = [1,4,5,6,7,8,10];
    
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
    
    function print(){
        echo $this->root->key . '<br>';
        $this->printBTree($this->root);
	}
    
	function printBTree($p){
		if($p == null){
			return;
		} else {
            echo '<br>';
            
            echo "{$p->leftChild->key} < - - {$p->key} - - > {$p->rightChild->key}";
            echo '<br>';
            
            $this->printBTree($p->leftChild);
            echo '<br>';
            
            $this->printBTree($p->rightChild);
            echo '<br>';
        }
    }
}
    
error_reporting( E_ERROR );

$tree = new BTree();
$tree->init();
$tree->print(); // вами реализованный метод показа сформированного дерева.
?>
</body>
</html>