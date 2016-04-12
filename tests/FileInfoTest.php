<?php

namespace Thapp\Fileitr\Tests;

use Thapp\Fileitr\FileInfo;

class FileInfoTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itShouldBeInstantiable()
    {
        $this->assertInstanceOf(FileInfo::class, new FileInfo(__FILE__));
    }
}
