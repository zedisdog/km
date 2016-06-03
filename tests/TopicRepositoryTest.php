<?php

/**
 * Created by PhpStorm.
 * User: zed
 * Date: 16-5-22
 * Time: 上午11:00
 */
class TopicRepositoryTest extends TestCase
{
    public function testAb()
    {
        $this->assertEquals('nthm', $this->app['TopicRepository']->ab('你 test 好吗'));
        $this->assertEquals('nthm', $this->app['TopicRepository']->ab('你test好吗'));
        $this->assertEquals('nthm', strtolower($this->app['TopicRepository']->ab('你Test好吗')));
        $this->assertEquals('nthm', strtolower($this->app['TopicRepository']->ab('你 TEST 好吗?')));
    }

    public function testUpdate()
    {
        $result = $this->app['TopicRepository']->update([
            'title' => '123',
            'content' => 'hahaha'
        ],1);

        $this->assertNotFalse($result);
    }
}
