<?PHP
# Задание 1 

echo "Реализовать метод build и print в классе BTree"; 
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
    const vertex = [1,4,5,6,7,8,10];
    function __construct(){
        $this->root = null;
    }
    function build(Vertex $child, $parent = null){
        if (!$this->root){
            $this->root=$child;
        return;
    }
        if (!parent)  $parent=$this->root;
    
    
    
    if ($child->key > $parent->key){
        //right child
        if(!$parent->root->rightChild){
             $parent->rightChild=$child;
             return;
        }
       
    } else {
       $this->build( $child, $parent->rightChild);   
    }
    } else {
        
     //left child   
   if ($child->key>$parent->key){
       
        if(!$parent->root->leftChild){
            $parent->leftChild=$child;
            return;
        }
       
    } else {
     $this->build $child;
     $parent->leftChild;   
    }         
    
//	protected $root = NULL;
//
//	public function isEmpty ()
//	{
//		return is_null($this->root);
//	}
//
//	public function insert ($value)
//	{
//		$node = new BinaryNode($value);
//		$this->insertNode($node, $this->root);
//	}
//
//	protected function insertNode (BinaryNode $node, &$subtree)
//	{
//		if (is_null($subtree)) 
//		{ 
//			$subtree = $node; 
//		}
//		else
//		{
//			if ($node->value < $subtree->value)
//			{
//				$this->insertNode($node, $subtree->left);
//			}
//			elseif ($node->value > $subtree->value)
//			{
//				$this->insertNode($node, $subtree->right);
//			}
//		}
//		return $this;
//	}
//}

    <!-- # вспомогательный метод который возвращает созданную вершину.
    function createVertex($key){
        return new Vertex($key); 
    } -->
        
        
        
protected function &findNode ($value, &$subtree)
{
	// Если элемент не найден, возвращаем FALSE
	if (is_null($subtree)) 
	{ 
		return FALSE; 
	}

	// Для искомого значения меньшего, чем значение узла, продолжаем искать в левом поддереве
	if ($subtree->value > $value)
	{
		return $this->findNode($value, $subtree->left);
	}
	// Для искомого значения большего, чем значение узла, продолжаем искать в правом поддереве
	elseif ($subtree->value < $value)
	{
		return $this->findNode($value, $subtree->right);
	}
	// Если искомое значение равно значению узла, то возвращаем этот узел
	else 
	{ 
		return $subtree; 
	}
}
    
    # создаем вершину и передаем в buildBTree
    function init() {
        foreach(self::vertex as $value) {
            $v = $this->createVertex($value); 
            $this->build($v); 
        }
    }
       
    function build (Vertex $child , $parent = null ) {
        echo "<pre>";
        print_r($child);
        echo "</pre>";
        # Реализуем логику поиска родителя исходя из правил формирования бинарного дерева
        
    }
    
    function print() {
        # Выводим содержимое дерева. 
                
    }
        
}

$tree = new BTree();
$tree->init();
#$tree->print(); // вами реализованный метод показа сформированного дерева.

?>