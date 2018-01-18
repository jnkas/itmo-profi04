<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/13/18
 * Time: 1:03 PM
 */

namespace Controllers;


use Models\BTree;

class BinaryTreeController
{

    public function build()
    {
        $bTree = new BTree([9, 4, 5, 3, 7, 17, 10]);
        $bTree->init();
        $bTree->print();
        $treeVars       = 'var config = {
            container: "#tree-structure",
        };';
        $configVarsList = ';var chart_config = [
            config';
        foreach ($bTree->renderData as $key => $value) {
            $treeVars .= 'var '.$key.' = {
                text: { name: "'.$value['text'].'" }
                '.(isset($value['parent']) ? ', parent:'.$value['parent'] : '').'
            };';

            $configVarsList .= ','.$key;
        }
        $treeVars .= $configVarsList.'];';
        return view('btree/index', [
            'config' => $treeVars
        ]);
    }

}