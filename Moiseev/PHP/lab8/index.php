
<?PHP
# Задание 1 
class Model {
    public function getPage() {
        return ['text' => 'Однажды в студеную зимнюю пору..'];
    }
}
class View {
    public function render ($data, $name_tpl) {
        include $name_tpl;
        echo $data['text'];
    }


}
class Controller {
    public function indexAction(){
        $mdl = new Model(); 
        $data = $mdl->getPage();
        $v = new View();
        $v ->render($data, 'allPage.php');
    }
    public function editAction(){
        echo "Редактирование";
    }

    public function delAction(){
        echo "Редактирование";
    }
}

//$route = $_GET['route'];
function  runController ()
{ 
    $ctr  = new Controller();
    $uri = $_SERVER[ 'REQUEST_URI' ];
       $action  =  trim( $uri ,  '/' );
    $route = $action . 'Action';
    $ctr->$route();
}

runController();






?>