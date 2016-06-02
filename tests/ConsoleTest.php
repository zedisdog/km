<?php

class ConsoleTest extends TestCase
{
    public function testSetAdmin()
    {
        $command = new \App\Console\Commands\Admin();
        var_dump($command->handle());
    }
}