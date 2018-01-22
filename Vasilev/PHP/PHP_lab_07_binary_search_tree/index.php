<?PHP
# Задание 1 

echo "Реализовать метод build и print в классе BTree"; 
# Класс описывающий вершину бинарного дерева
class Vertex {
    public $key; //$key - это значение из массива ниже.
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
    const vertex = [7,5,6,8,10,11,1];
	public $mass = [];
	
	//
			function __construct(){
				$this->root = NULL;
			}
			
    # вспомогательный метод который возвращает созданную вершину.
    function createVertex($key){
        return new Vertex($key); 
    }
    
    # создаем вершину и передаем в buildBTree
    function init() {
		//
		//$mass = [];
		
        foreach(self::vertex as $value) {
            $v = $this->createVertex($value);
			
			//
			$this->mass[] = $v;//заносим вертексы. (т.к. они не состоят в коллекции).
            
			
			$this->build($v); 
        }
		//echo "<pre>";
        //print_r($mass);
        //echo "</pre>";
		//echo "<br><br>";
		//var_dump($mass);
    }
       
    function build (Vertex $child , $parent = null ) {
		
		if(!$this->root){   //если ROOT пустой, то мы его устанавливаем
			$this->root = $child;
			return;
		};
		if(!$parent){
			$parent=$this->root;
		}
		//Проверяем child больше или меньше родителя
		if($child->key > $parent->key){// если условие верно - это rightChild.
			//теперь проверить, есть ли вакантные места у родителей..
			if(!$parent->rightChild){
				$parent->rightChild = $child;
				return;
			} else {
				$this->build($child, $parent->rightChild);
			}
			
		} else { //для leftChild
			if(!$parent->leftChild){
				$parent->leftChild = $child;
				return;
			} else {
				$this->build($child, $parent->leftChild);
			}
		}
		
		
       // echo "<pre>";
        //print_r($child);
        //echo "</pre>";
        # Реализуем логику поиска родителя исходя из правил формирования бинарного дерева
        
    }
    
    function print_() {
        # Выводим содержимое дерева. 
               		/*echo "<pre>";
					var_dump($this->mass);
					echo "</pre>";*/
			   //
				foreach($this->mass as $value){
					echo "<pre>";
					print_r($value);
					echo "</pre>";
				}
    }
        
}

$tree = new BTree();
$tree->init();
$tree->print_(); // вами реализованный метод показа сформированного дерева.


/*
echo "<br><br>";


$arr = array(1,4,5,6,7,8,10);


foreach ($arr as $key => $value) {
	
    echo "Ключ: $key; Значение: $value<br />\n";
}

*/







?>