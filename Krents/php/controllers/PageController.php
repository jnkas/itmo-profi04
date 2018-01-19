<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers;


class PageController
{

    public function show($input)
    {
        return view('/admin/page/index');
    }

    public function showFromFiles($id)
    {
        $view = '/pages_files/'.$id;
        ;
        if (file_exists(APP_PATH.'/views'.$view.'.php')) {
            return view($view, [
                'menu' => $this->getMenu()
            ]);
        }
        echo '<h1>404</h1>';
        return http_response_code(404);

    }


    private function getMenu()
    {
        $mainDir       = APP_PATH.'/views/pages_files';
        $categoriesSrc = app()->config('categories');
        $categories    = [];
        $dirs          = array_filter(glob($mainDir.'/*'), 'is_dir');
        foreach ($dirs as $dir) {
            $category = str_replace($mainDir.'/', '', $dir);
            $pages    = glob($dir.'/*.php');
            foreach ($pages as $page) {
                preg_match('/<title>(.*)<\/title>/', file_get_contents($page), $matches);
                $categories[$category][] = [
                    'href'  => str_replace([$dir.'/', '.php'], '', $page),
                    'title' => $matches[1]
                ];
            }
        }
        $menu = '';
        foreach ($categories as $key => $category) {
            $menu .= '<p>'.$categoriesSrc[$key].'</p><ul>';
            foreach ($category as $page) {
                $menu .= '<li><a href="/pages_files/'.$key.'/'.$page['href'].'">'.$page['title'].'</a></li>';
            }
            $menu .= '</ul>';
        }
        return $menu;
    }
}