<?PHP
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
    const vertex = [1,123,5,12,7,23,10,112,89];
    
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
        echo $this->root->key.'<br>';
        $this->printTree2($this->root);
            
	}
	public function printTree2($p){
		if($p == null){
			return;
		} else {
            echo '<br>';
            
            echo "{$p->leftChild->key} <<< {$p->key} >>> {$p->rightChild->key}";
            $this->printTree2($p->leftChild);
            $this->printTree2($p->rightChild);
            echo '<br>';
			
        }
    }
}

$tree = new BTree();
$tree->init();
$tree->printTree();
?>