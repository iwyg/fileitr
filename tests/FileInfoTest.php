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

    /** @test */
    public function itToArrayShouldContainMimeType()
    {
        $info = new FileInfo(__FILE__);

        $this->assertArrayHasKey('mimetype', $info->toArray());
        $this->assertArrayHasKey('extension', $info->toArray());
    }
}
