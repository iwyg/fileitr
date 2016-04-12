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

use FilesystemIterator;
use InvalidArgumentException;
use RecursiveDirectoryIterator as BaseIterator;

/**
 * @class RecursiveDirectoryIterator
 * @see BaseIterator
 *
 * @package Thapp\Fileitr
 * @version $Id$
 * @author iwyg <mail@thomas-appel.com>
 */
class RecursiveDirectoryIterator extends BaseIterator
{
    use LimitIteratorTrait;

    /**
     * Creates a new Recursive Directory Iterator.
     *
     * @param string  $path
     * @param int $limit
     * @param int $flags
     * @throws InvalidArgumentException if $flags contain an
     * CURRENT_AS_* flag other then CURRENT_AS_FILEINFO.
     */
    public function __construct($path, $limit = -1, $flags = null)
    {
        if ($flags & (FilesystemIterator::CURRENT_AS_SELF|FilesystemIterator::CURRENT_AS_PATHNAME)) {
            throw new InvalidArgumentException(
                sprintf('%s only supports FilesystemIterator::CURRENT_AS_FILEINFO.', __CLASS__)
            );
        }

        parent::__construct($path, $flags);

        $this->limit = $limit;
        $this->max = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return new FileInfo(parent::current()->getPathname(), $this->getSubPath(), $this->getSubPathname());
    }
}
