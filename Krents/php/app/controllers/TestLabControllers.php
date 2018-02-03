<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/13/18
 * Time: 11:53 AM
 */

namespace Controllers;


use App\Models\Stack;
use App\Models\Queue;

class TestLabControllers
{
    public function stack()
    {
        /** @var Stack $stack */
        $stack = new Stack();
        $stack->push(3);
        $stack->push(10);
        var_dump($stack->pop());
        var_dump($stack->pop());
        var_dump($stack->pop());
        var_dump($stack->pop());
        var_dump($stack->pop());
    }

    public function queue()
    {
        /** @var Queue $queue */
        $queue = new Queue();
        $queue->push(3);
        $queue->push(10);
        var_dump($queue->shift());
        $queue->push(12);
        var_dump($queue->shift());
        var_dump($queue->shift());
    }

    public function test($id)
    {
        var_dump($id);
    }

    public function testRequest()
    {
        var_dump(app()->request->input->all());
        var_dump(app()->request->session->all());
        var_dump(app()->request->getClientIp());
    }
}