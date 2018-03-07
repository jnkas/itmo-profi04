<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 12/19/17
 * Time: 7:57 PM
 */

namespace Controllers;


use App\Models\FirstTask;

class FirstHomeWorkController
{
    const TEST_CONST = 'This variable is const';

    public function index()
    {
        $testVar = 10;
        FirstTask::printValue('Variable', $testVar);
        FirstTask::printValue('Sum', "$testVar + 10 = ".($testVar + 10));
        FirstTask::printValue('Multiple', "$testVar * 10 = ".($testVar * 10));


        FirstTask::printValue('Constant', self::TEST_CONST);

        if (true) {
            FirstTask::printValue('Test if', 1);
        }

        for ($i = 0; $i < 5; $i++) {
            FirstTask::printValue('Iterate at for', $i);
        }
        while ($i > 0) {
            FirstTask::printValue('Iterate at while', $i);
            $i--;
        }
        do {
            FirstTask::printValue('Iterate at do while', $i);
            $i++;
        } while ($i < 5);

        // Arrays
        $array          = [1, 2, 3, 4];
        $arrayAssociate = [
            'key_1' => 1,
            'key_2' => 2,
            'key_3' => 3,
            'key_4' => 4,
        ];
        FirstTask::debugValue('Numbered array', $array);
        FirstTask::debugValue('Associative array', $arrayAssociate);
    }
}