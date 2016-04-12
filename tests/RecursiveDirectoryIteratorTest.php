<?php

namespace Thapp\Fileitr\Tests;

use Thapp\Fileitr\RecursiveDirectoryIterator;

class RecursiveDirectoryIteratorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itShouldBeInstantiable()
    {
        $this->assertInstanceOf(RecursiveDirectoryIterator::class, new RecursiveDirectoryIterator(__DIR__));
    }

    /** @test */
    public function itShouldReturnFileInfoObjects()
    {
        $itr = new RecursiveDirectoryIterator(__DIR__, 1);

        $result = array_values(iterator_to_array($itr));

        $this->assertInstanceOf('Thapp\Fileitr\FileInfo', $result[0]);
    }

    /** @test */
    public function itShouldSetRelativePathsOnFileInfos()
    {
        $itr = new RecursiveDirectoryIterator(__DIR__, 1, RecursiveDirectoryIterator::SKIP_DOTS);

        $result = array_values(iterator_to_array($itr));

        $this->assertEquals("", $result[0]->getRelativePath());
        $this->assertTrue(0 === substr_count($result[0]->getRelativePathname(), DIRECTORY_SEPARATOR));
    }

    /** @test */
    public function itShouldLimitResults()
    {
        $itr = new RecursiveDirectoryIterator(__DIR__, 2, RecursiveDirectoryIterator::SKIP_DOTS);

        $result = iterator_to_array($itr);

        $this->assertTrue(2 === count($result));
    }
}