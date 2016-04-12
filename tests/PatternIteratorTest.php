<?php

namespace Thapp\Fileitr\Tests;

use Thapp\Fileitr\PatternIterator;

class PatternIteratorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function itShouldBeInstantiable()
    {
        $this->assertInstanceOf(PatternIterator::class, new PatternIterator(__DIR__, '/.*txt$/'));
    }

    /** @test */
    public function itShouldIterateOverDirectories()
    {
        $itr = new PatternIterator(__DIR__, '/\.(php)$/', 1);

        $files = iterator_to_array($itr);

        var_dump(count($files));
        $this->assertTrue(count($files) > 1);

    }

    /** @test */
    public function itShouldLimitFilecount()
    {
        $itr = new PatternIterator(__DIR__, '/\.(php)$/', 1, 1);

        $files = iterator_to_array($itr);

        $this->assertTrue(count($files) === 1);

        $vals = array_values($files);
        var_dump($vals[0]);
    }
}
