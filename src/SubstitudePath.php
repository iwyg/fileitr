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

use InvalidArgumentException;

/**
 * @class SubstitudePath
 * @version $Id$
 */
trait SubstitudePath
{
    /**
     * substitutePaths
     *
     * @param string $root
     * @param string $current
     *
     * @return string
     */
    private function substitutePaths($root, $current)
    {
        $path = substr($current, 0, strlen($root));

        if (strcasecmp($root, $path) !== 0) {
            throw new InvalidArgumentException('Root path does not contain current path.');
        }

        $subPath = substr($current, strlen($root) + 1);

        return false === $subPath ? '' : $subPath;
    }
}
