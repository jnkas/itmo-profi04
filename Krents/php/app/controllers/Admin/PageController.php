<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers\Admin;


use Lumisade\Models\Input;
use App\Models\Page;

class PageController extends AdminBaseController
{

    public function index()
    {
        return view('/admin/page/index', [
            'pages'     => (new Page())->getAllPages()->pages,
            'pageTitle' => null,
            'actionUrl' => null,
            'title'     => null,
            'content'   => null,
        ]);
    }

    public function create(Input $input)
    {
        $page          = new Page();
        $page->content = $input->get('content');
        $page->title   = $input->get('title');
        $page->create();
        return app()->redirect('/admin/page');
    }

    public function edit($id, Input $input)
    {
        $pageModel = new Page();
        if (app()->request->isMethod('post')) {
            $pageModel->edit($id, $input->get('title'), $input->get('content'));
            return app()->redirect('/admin/page');
        }
        $page = $pageModel->get($id);
        return view('/admin/page/index', [
            'pages'     => (new Page())->getAllPages()->pages,
            'title'     => $page->title,
            'content'   => $page->content,
            'pageTitle' => 'Редактирование страницы "'.$page->title.'"',
            'actionUrl' => '/admin/page/edit/'.$id,
        ]);
    }

    public function delete($id)
    {
        (new Page())->delete($id);
        return app()->redirect('/admin/page');
    }

}