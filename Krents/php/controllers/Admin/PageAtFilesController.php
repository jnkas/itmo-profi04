<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers\Admin;


use Framework\Input;

class PageAtFilesController extends AdminBaseController
{

    public function index()
    {
        return view('/admin/page_files/index', [
            'categories' => app()->config('categories')
        ]);
    }

    public function create(Input $input)
    {
        $dir = APP_PATH.'/views/pages_files/'.$input->get('category');
        if(!is_dir($dir)){
            mkdir($dir);
        }
        file_put_contents(
            $dir.'/'.$this->generateName($input->get('title')).'.php',
            str_replace('<body>','<body><?= $menu ?>',$input->get('content'))
        );
        return app()->redirect('/admin/pages_files');
    }


    private function generateName($name){
        return  str_replace(' ', '-', strtolower(transliterate($name)));
    }
}