<?PHP 

# Задание 1 `

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

# Класс constr в котором создаются вершины и происходит формирование дерева 
class BTree {
    public $root;

    public function __construct($vertex) {
        $this->root = self::createVertex($vertex[0]);
        for($i = 1; $i<sizeof($vertex); $i++) {
            self::createNode($this->root, self::createVertex($vertex[$i]));    
        }        
    }
//helper for BTree constructor add element(vertex) in to tree 
    function createNode($root, $node){
        if($root->key > $node->key){
            if($root->leftChild == null) $root->leftChild = $node; 
            else self::createNode($root->leftChild, $node);  
        }   
        elseif($root->key < $node->key){
            if($root->rightChild == null) $root->rightChild = $node; 
            else self::createNode($root->rightChild, $node);      
            } 
        else{

            }   
    }

    # вспомогательный метод который возвращает созданную вершину.
    function createVertex($key){
        return new Vertex($key); 
    }
    
       
    
  //drowing btree  
    public function printTree(){
        $matrix = self::printTreehelper($this->root);
        $n = sizeof($matrix);
        $result = "<div style='font-family: monospace;'><br>";
        for($i = 0; $i<sizeof($matrix); $i++){
            for($j = 0; $j < pow(2,$i); $j++){
                if($j == 0) $result .= str_repeat("&nbsp;", pow(2,$n-$i)-1);
                else $result .= str_repeat("&nbsp;", pow(2,$n+1-$i)-2);
                if(isset($matrix[$i][$j])) $result .= $matrix[$i][$j];
                else $result .= str_repeat("&nbsp;", 2);
            }
            $result .= "<br>";  
        }
        echo $result."</div>";
    }

// placing in to matrix
    public function printTreehelper($root, $arr = array(), $i = 0, $j = 0){
        if(!isset($arr[$i])) $arr[$i] = array();
        $arr[$i][$j] = $root->key;
        //echo "<br>";
        //var_dump($arr);
        //echo " = [".$i ."][". $j."] : ". $root->key. "<br>";
        if($root->leftChild != null) $arr = self::printTreehelper($root->leftChild, $arr, $i+1, $j*2);
        if($root->rightChild != null) $arr = self::printTreehelper($root->rightChild, $arr, $i+1, $j*2+1);
        return $arr;
    }
            
}


$tree = new BTree([1,10,20,-2, 5, 15,-3]);
//var_dump($tree);
$tree->printTree();

$tree1 = new BTree([0,-10,-20,-25,-15,-5,-7,-4,10,20,25,15,5,7,4]);
$tree1->printTree();

?> 