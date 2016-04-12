<?php

/*
 * This File is part of the Thapp\Fileitr package
 *
 * (c) iwyg <mail@thomas-appel.com>
 *
 * For full copyright and license information, please refer to the LICENSE file
 * that was distributed with this package.
 */

namespace Thapp\Fileitr;

/**
 * @trait LimitIteratorTrait
 *
 * @package Thapp\Fileitr
 * @version $Id$
 * @author iwyg <mail@thomas-appel.com>
 */
trait LimitIteratorTrait
{
    /** @var int */
    private $limit;

    /** @var int */
    private $max;
    
    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        if ($this->limit > -1 && $this->max === $this->limit) {
            return false;
        }

        return parent::valid();
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->max++;

        return parent::next();
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->max = 0;
        parent::rewind();
    }
}
