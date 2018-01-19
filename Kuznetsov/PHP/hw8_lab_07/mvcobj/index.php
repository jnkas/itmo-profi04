<?php
//транслитерация
function translit($s) {
  $s = (string) $s; // преобразуем в строковое значение
  $s = strip_tags($s); // убираем HTML-теги
  $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
  $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
  return $s; // возвращаем результат
}

//Инициализация классов
class Model {
    //добавление страницы
    public function addPage($title, $text) {
        if(!empty($title) && !empty($text) && (substr_count($text, "\r\n"))===0) {
            $lines = file('page.txt');
            $arr = explode('~', end($lines));
            $i = (empty($arr[0]))? 1 : $arr[0]+1;
            $title = translit($title);
            $str = "{$i}~{$title}~{$text}\r\n";
            file_put_contents('page.txt', $str, FILE_APPEND);
        }
    }
    //удаление страницы по id
    public function delPage($id) {
        $lines = file('page.txt');
        $fop = fopen('page.txt', 'w+b');
        foreach($lines as $key=>$value) {
            $arr = explode('~', $value);
            if($arr[0] !== $id) {
                fwrite($fop, $lines[$key]);
            }
        }
        fclose($fop);
    }
    //редактирование страницы
    public function editPage($id, $title, $text) {
        if(!empty($title) && !empty($text)) {
            if(substr_count($text, "\r\n") > 0) {
                $text = str_replace("\r\n", " ", $text);
            }
            $lines = file('page.txt');
            $fop = fopen('page.txt', 'w+b');
            $title = translit($title);
                foreach($lines as $key=>$value) {
                    $arr = explode('~', $value);
                if($arr[0] === $id) {
                    $str = "{$id}~{$title}~{$text}\r\n";
                    fwrite($fop, $str);
                } else {
                    fwrite($fop, $lines[$key]);
                }
            }
            fclose($fop);
        }   
    }
    //получение страницы
    public function getPage($id) {
        $lines = file('page.txt');
        foreach($lines as $key=>$value) {
            $str_arr = explode('~', $value);
            if($str_arr[0] === $id) {
                $arr[] = [
                'id' => $str_arr[0],
                'title' => $str_arr[1],
                'text' => $str_arr[2]
                ];
            }
        }
        return $arr;
    }
    //получение всех страниц
    public function getAllPages() {
        $lines = file('page.txt');
        foreach($lines as $key=>$value) {
            $str_arr = explode('~', $value);
            $arr[] = [
                'id' => $str_arr[0],
                'title' => $str_arr[1],
                'text' => $str_arr[2]
            ];
        }
        return array_reverse($arr);
    }
}

class View {
    public function render($data, $tmplt_name) {
        include $tmplt_name;
        
    }
    
}

class Controller {
    public function indexAction() {
        $model = new Model();
        $mdl = $model->getAllPages();
        $v = new View();
        $v->render($mdl, 'template.php');
    }
    
    public function adminAction($id) {
        //админка
        if(!empty($id)) {
            $model = new Model();
            $data = $model->getPage($id);
            $v = new View();
            $v->render($data, 'admin.php');
        } else {
            $v = new View();
            $v->render($d, 'admin.php');
        }
    }
    
    public function addAction() {
        //добавление страницы
        $title = $_POST['page_name'];
        $text = $_POST['page_content'];
        $model = new Model();
        $model->addPage($title, $text);
        header("Location: index");
    }
    
    public function delAction($id) {
        //удаление страницы
        $model = new Model();
        $model->delPage($id);
        header("Location: index");
    }
    
    public function editAction($id) {
        //echo 'редактирование';
        $title = $_POST['page_name'];
        $text = $_POST['page_content'];
        $model = new Model();
        $model->editPage($id, $title, $text);
        header("Location: index");
    }
    
    public function getAction($id) {
        //echo 'получение страницы';
        $model = new Model();
        $mdl = $model->getPage($id);
        $v = new View();
        $v->render($mdl, 'template.php');
    }
}

function  runController () { 
    $ctr  = new Controller();
    $url = $_SERVER[ 'REQUEST_URI' ];
    $action  = basename($url);
    //$action  =  trim( $url ,  '/' );
    if(strcasecmp($action, 'mvcobj') === 0) {
        $route = 'indexAction';
        $ctr->$route();
    } else {
        $data_arr = explode('?',$action);
        $route = $data_arr[0] . 'Action';
        $ctr->$route($data_arr[1]);
    }
}

runController();

?>