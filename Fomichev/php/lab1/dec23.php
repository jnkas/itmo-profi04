<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    
    <?php
    
    class Shop {
        
        Private $name;
        public function naming(){
            $this -> name = "Adidas";
            echo $this -> name;
        }
    }
    
    
    $product = new Shop;
    $product-> naming();
    
    
    
    ?>
</body>
</html>